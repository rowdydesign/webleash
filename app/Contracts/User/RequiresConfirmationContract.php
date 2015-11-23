<?php

namespace App\Contracts\User;

/**
 * Requires Confirmation Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

use App\Contracts\Mail\MailServiceContract;

interface RequiresConfirmationContract {

    /**
     * Generate confirmation code
     *
     * @return string
     */
    public static function generateConfirmationCode();

    /**
     * Confirm user
     *
     * @return User
     */
    public function confirm();

    /**
     * Unconfirm user
     *
     * @return User
     */
    public function unconfirm();

    /**
     * Get confirmation code
     *
     * @return string
     */
    public function getConfirmationCode();

    /**
     * Set confirmation code
     *
     * @param  string  $value
     *
     * @return User
     */
    public function setConfirmationCode($value);

    /**
     * Get confirmed value
     *
     * @return string
     */
    public function getConfirmed();

    /**
     * Set confirmed value
     *
     * @param  bool  $value
     *
     * @return User
     */
    public function setConfirmed($value);

    /**
     * Is confirmed
     *
     * @return bool
     */
    public function isConfirmed();

    /**
     * Verify confirmation code
     *
     * @param  string  $code
     *
     * @return bool
     */
    public function verifyConfirmationCode($code);

    /**
     * Create and send confirmation code
     */
    public function createAndSendConfirmationCode();

}
