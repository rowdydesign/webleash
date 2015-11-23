<?php

namespace App\Services\Widget;

/**
 * Widget Lookup Service
 *
 * @author Bret Mette <bret.mette@rowdyesign.com>
 * @category Service
 */

use App\Contracts\Widget\LookupServiceContract;
use App\Widget;

class LookupService implements LookupServiceContract
{

    /**
     * Get by
     *
     * @param  string  $key
     * @param  string  $value
     *
     * @return \App\Widget
     */
    public function getBy($key, $value)
    {
        return Widget::where($key, $value)->first();
    }

}
