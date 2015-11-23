<?php

namespace App\Services\Auth;

use App\Contracts\Auth\AccountConfirmationServiceContract;
use App\Exceptions\Auth\AccountNotConfirmedException;

class AccountConfirmationService implements AccountConfirmationServiceContract {

    /**
     * On Auth Attempt
     */
    public function onAuthAttempt($event)
    {
        $userLookup = \App::make('\App\Contracts\User\LookupServiceContract');

        $email = $event['email'];

        $user = $userLookup->getBy('email', $email);

        if (!$user->isConfirmed()) {
            throw new AccountNotConfirmedException;
        }
    }

}
