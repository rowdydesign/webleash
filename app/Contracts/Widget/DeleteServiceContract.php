<?php

namespace App\Contracts\Widget;

/**
 * Widget Delete Service Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

use \App\Widget;

interface DeleteServiceContract {

    /**
     * Delete widget
     *
     * @param  \App\Widget  $widget
     * @return  bool
     */
    public function delete(\App\Widget $widget);

}
