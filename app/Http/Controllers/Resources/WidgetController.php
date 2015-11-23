<?php

namespace App\Http\Controllers\Resources;

/**
 * Widget Controller
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Controller
 */

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Contracts\Repositories\WidgetRepositoryContract;

class WidgetController extends Controller
{

    /**
     * Instantiate the WidgetController
     *
     * @param  \App\Contracts\Repositories\WidgetRepositoryContract  $repo
     */
    public function __construct(WidgetRepositoryContract $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $inputWidgets = json_decode($request->input('widgets'), true);

        foreach ($inputWidgets as $inputWidget) {
            if (isset($inputWidget) && is_array($inputWidget)) {
                // Widget exists
                if (array_key_exists('uuid', $inputWidget) && strlen($inputWidget['uuid'])) {
                    $widget = $this->repo->getWidgetBy('uuid', $inputWidget['uuid']);

                    if ($widget) {
                        foreach ($inputWidget['meta'] as $key=>$value) {
                            $widget->setMetaData($key, $value);
                        }

                        $this->repo->saveWidget($widget);
                    }
                }
            }
        }

        return response()->json(['success' => true], 200);
    }

    /**
     * Store the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();

        $inputWidget = json_decode($request->input('widget'), true);
        $widget = $this->repo->createWidget($inputWidget);

        $user->widgets()->attach($widget);

        return response()->json([
            'success' => true,
            'data' => [
                'widget' => $widget->toArray(),
            ]
        ]);
    }

    /**
     * Destroy the specified resource from storage.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $widget = $this->repo->getWidgetBy('uuid', $uuid);

        if ($widget) {
            $this->repo->deleteWidget($widget);
        }

        return response()->json(['success' => true]);
    }

}
