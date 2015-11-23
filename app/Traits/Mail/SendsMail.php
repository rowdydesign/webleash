<?php

namespace App\Traits\Mail;

/**
 * Sends Mail
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Trait
 */

use Illuminate\Support\Facades\Mail;

trait SendsMail {

    /**
     * Send a new message using a view.
     *
     * @param  string|array  $view
     * @param  array  $data
     * @param  \Closure|string  $callback
     * @return void
     */
    public function send($view, array $data, $callback)
    {
        return Mail::send($view, $data, $callback);
    }
}

