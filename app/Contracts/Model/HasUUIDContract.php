<?php

namespace App\Contracts\Model;

/**
 * Has UUID Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

interface HasUUIDContract {

    /**
     * Set UUID
     *
     * @param string $uuid
     */
    public function setUUID($uuid);

}
