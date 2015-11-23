<?php

namespace App\Services\Widget;

/**
 * Widget Delete Service
 *
 * @author Bret Mette <bret.mette@rowdyesign.com>
 * @category Service
 */

use App\Contracts\Widget\DeleteServiceContract;
use App\Widget;

class DeleteService implements DeleteServiceContract
{

    /**
     * Create
     *
     * @param  \App\Widget  $widget
     */
    public function delete(Widget $widget)
    {
        return $widget->delete();
    }

}
