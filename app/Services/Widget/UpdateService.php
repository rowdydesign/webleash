<?php

namespace App\Services\Widget;

/**
 * Widget Update Service
 *
 * @author Bret Mette <bret.mette@rowdyesign.com>
 * @category Service
 */

use App\Contracts\Widget\UpdateServiceContract;
use App\Widget;

class UpdateService implements UpdateServiceContract
{

    /**
     * Update widget
     *
     * @param  \App\Widget  $widget
     * @return bool
     */
    public function save($widget)
    {
        return $widget->save();
    }

}
