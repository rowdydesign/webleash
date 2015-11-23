<?php

namespace App\Factories\Mail;

/**
 * Mail Service Factory
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @caregory Factory
 */

use App\Contracts\Mail\ServiceFactoryContract;

class ServiceFactory implements ServiceFactoryContract
{

    /**
     * Make a mail service factory by type
     *
     * @param  string  $type
     * @return  \App\Contracts\Mail\ServiceContract
     *
     */
    public static function makeByType($type)
    {
        switch ($type) {
            case 'AccountConfirmation':
                return \App::make('\App\Contracts\Mail\Services\AccountConfirmationServiceContract');
                break;
        }
    }

}
