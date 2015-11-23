<?php

namespace App\Contracts\Auth;

/**
 * Registration Service Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

interface RegistrationServiceContract {

    /**
     * Create from registration
     *
     * @param array $attributes
     *
     * @return User
     */
    public function createUser(array $attributes = array());

}
