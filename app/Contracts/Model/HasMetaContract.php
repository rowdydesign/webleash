<?php

namespace App\Contracts\Model;

/**
 * Has Meta Contract
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Contract
 */

interface HasMetaContract {

    public function getMeta();

    public function getMetaData($key);

    public function setMetaData($key, $value);

}
