<?php

namespace App\Contracts\Widget;

/**
 * Widget Lookup Service Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

interface LookupServiceContract {

    /**
     * Get by
     *
     * @param  string  $key
     * @param  string  $value
     *
     * @return \App\Widget
     */
    public function getBy($key, $value);

}
