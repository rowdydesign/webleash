<?php

namespace App\Contracts\Widget;

/**
 * Widget Create Service Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

interface CreateServiceContract {

    /**
     * Create
     *
     * @param  array  $attributes
     * @return \App\Widget
     */
    public function create(array $attributes = array());

}
