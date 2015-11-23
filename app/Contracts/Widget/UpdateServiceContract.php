<?php

namespace App\Contracts\Widget;

/**
 * Widget Update Service Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

interface UpdateServiceContract {

    /**
     * Save widget
     *
     * @param  \App\Widget  $widget
     * @return  bool
     */
    public function save($widget);

}
