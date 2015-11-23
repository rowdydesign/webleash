<?php

namespace App\Contracts\Mail;

/**
 * Sends Mail Trait Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

interface SendsMailContract {

    /**
     * Send a new message using a view.
     *
     * @param  string|array  $view
     * @param  array  $data
     * @param  \Closure|string  $callback
     * @return void
     */
    public function send($view, array $data, $callback);

}
