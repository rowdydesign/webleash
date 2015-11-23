<?php

namespace App\Services\Mail;

use App\Contracts\Mail\Services\AccountConfirmationServiceContract;
use App\Contracts\Mail\SendsMailContract;

use App\Traits\Mail\SendsMail;

class AccountConfirmationService implements AccountConfirmationServiceContract, SendsMailContract
{
    use SendsMail;

    /**
     * Send confirmation code email
     *
     * @param  array  $params
     *
     * @return bool
     */
    public function sendConfirmationCodeEmail(array $params = array())
    {
        $confirmationCode = $params['confirmation_code'];

        return $this->send('email.account.verify', ['emailAddress' => $params['email_address'], 'confirmationCode' => $confirmationCode], function($message) use ($params) {
            $firstName = $params['to_name'];
            $email = $params['to'];

            $message->to($email, $firstName)
                ->subject('Verify your email address');
        });
    }
}
