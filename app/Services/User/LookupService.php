<?php

namespace App\Services\User;

/**
 * User Lookup Service
 *
 * @author Bret Mette <bret.mette@rowdyesign.com>
 * @category Service
 */

use App\Contracts\User\LookupServiceContract;
use App\User;

class LookupService implements LookupServiceContract
{

    /**
     * Get by
     *
     * @param  string  $key
     * @param  string  $value
     *
     * @return \App\User
     */
    public function getBy($key, $value)
    {
        return User::where($key, $value)->first();
    }

}
