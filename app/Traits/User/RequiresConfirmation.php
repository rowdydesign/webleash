<?php

namespace App\Traits\User;

/**
 * Requires Confirmation
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Trait
 */

trait RequiresConfirmation {

    public static function bootRequiresConfirmation()
    {
        static::created(function($user) {
            $user->createAndSendConfirmationCode();
        });
    }

    public static function generateConfirmationCode()
    {
        return str_random(30);
    }

    /**
     * Mark as unconfirmed
     *
     * @return User
     */
    public function confirm()
    {
        $this->setConfirmed(1);
        $this->update();

        return $this;
    }

    public function unconfirm()
    {
        $this->setConfirmed(0);
        $this->update();

        return $this;
    }

    public function getConfirmationCode()
    {
        return $this->confirmation_code;
    }

    public function setConfirmationCode($value)
    {
        $this->confirmation_code = $value;

        return $this;
    }

    public function getConfirmed()
    {
        return $this->confirmed;
    }

    public function setConfirmed($value)
    {
        $this->confirmed = intval((bool)$value);

        return $this;
    }

    public function isConfirmed()
    {
        return (bool)$this->getConfirmed();
    }

    public function verifyConfirmationCode($code)
    {
        if ($this->getConfirmationCode() === $code) {
            $this->confirm();

            return true;
        }

        return false;
    }

    public function createAndSendConfirmationCode()
    {
        $confirmationCode = $this->generateConfirmationCode();

        $this->setConfirmationCode($confirmationCode);

        $mailer = \MailServiceFactory::makeByType('AccountConfirmation');

        $params = array(
            'email_address' => $this->getEmail(),
            'confirmation_code' => $confirmationCode,
            'to_name' => $this->getFirstName(),
            'to' => $this->getEmail(),
        );

        $mailer->sendConfirmationCodeEmail($params);

        return $this->update();
    }


}
