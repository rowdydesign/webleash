<?php

namespace App\Contracts\User;

/**
 * User Lookup Service Contract
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
     * @return \App\User
     */
    public function getBy($key, $value);

}
