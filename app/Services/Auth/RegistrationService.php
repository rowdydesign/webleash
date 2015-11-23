<?php

namespace App\Services\Auth;

use App\User;
use App\Contracts\Auth\RegistrationServiceContract;

class RegistrationService implements RegistrationServiceContract {

    /**
     * Create from registration
     *
     * @param array $attributes
     *
     * @return User
     */
    public function createUser(array $attributes = array())
    {
        return User::create($attributes);
    }

    public function isUnique($key)
    {
        return !(bool)User::where(['email' => $key])->count();
    }
}
