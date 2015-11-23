<?php

namespace App\Traits\Model;

/**
 * Has UUID Trait
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Trait
 */

use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

trait HasUUID {

    public static function bootHasUUID()
    {
        static::creating(function($model) {
            $model->setUUID($model->generateUUID());
        });
    }

    public function setUUID($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getUUID()
    {
        return $this->uuid;
    }

    protected function generateUUID()
    {
        return Uuid::uuid4();
    }

}
