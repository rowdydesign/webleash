<?php

namespace App\Facades\Mail;

/**
 * Mail Service Factory Facade
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Facade
 */

use Illuminate\Support\Facades\Facade;

class ServiceFactoryFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     **/
    protected static function getFacadeAccessor() { return 'MailServiceFactory'; }
}

