<?php

namespace App\Contracts\Repositories;

/**
 * Widget Repository
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Repository
 */

use \App\Widget;

interface WidgetRepositoryContract
{

    /**
     * Create widget
     *
     * @param  array  $attributes
     * @return \App\Widget
     */
    public function createWidget(array $attributes = array());

    /**
     * Get widget by
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return \App\Widget
     */
    public function getWidgetBy($key, $value);

    /**
     * Save widget
     *
     * @param  \App\Widget  $widget
     * @return bool
     */
    public function saveWidget(Widget $widget);

}
