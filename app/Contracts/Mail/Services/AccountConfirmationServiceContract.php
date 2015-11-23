<?php

namespace App\Contracts\Mail\Services;

/**
 * Account Confirmation Service Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

interface AccountConfirmationServiceContract {

    /**
     * Send confirmation code email
     *
     * @param  array  $params
     *
     * @return bool
     */
    public function sendConfirmationCodeEmail(array $params = array());

}
