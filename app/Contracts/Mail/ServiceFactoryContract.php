<?php

namespace App\Contracts\Mail;

/**
 * Mail Service Factory Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

interface ServiceFactoryContract
{

    /**
     * Make a mail service factory by type
     *
     * @param  string  $type
     * @return  \App\Contracts\Mail\ServiceContract
     *
     */
    public static function makeByType($type);

}
