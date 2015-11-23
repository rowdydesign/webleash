<?php

namespace App\Contracts\Repositories;

/**
 * User Repository
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Repository
 */

use \App\Widget;

interface UserRepositoryContract
{
    /**
     * Get user by
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return \App\User
     */
    public function getUserBy($key, $value);

}
