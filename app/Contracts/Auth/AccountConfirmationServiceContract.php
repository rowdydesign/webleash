<?php

namespace App\Contracts\Auth;

/**
 * Account Confirmation Service Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

interface AccountConfirmationServiceContract {

    /**
     * On login attempt
     */
    public function onAuthAttempt($event);

}
