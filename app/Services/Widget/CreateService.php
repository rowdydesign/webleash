<?php

namespace App\Services\Widget;

/**
 * Widget Create Service
 *
 * @author Bret Mette <bret.mette@rowdyesign.com>
 * @category Service
 */

use App\Contracts\Widget\CreateServiceContract;
use App\Widget;

class CreateService implements CreateServiceContract
{

    /**
     * Create
     *
     * @param  array  $attributes
     * @return \App\Widget
     */
    public function create(array $attributes = array())
    {
        return Widget::create($attributes);
    }

}
