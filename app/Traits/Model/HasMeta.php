<?php

namespace App\Traits\Model;

/**
 * Has Meta Trait
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Trait
 */

trait HasMeta {

    public static function bootHasMeta()
    {
    }

    public function getMeta()
    {
        return $this->meta;
    }

    public function getMetaData($key)
    {
        if (isset($this->meta) && is_array($this->meta) && count($this->meta) && array_key_exists($key, $this->meta)) {
            return $this->meta[$key];
        }

        return null;
    }

    public function setMetaData($key, $value)
    {
        $meta = $this->meta;

        if (!isset($meta) || (isset($meta) && !is_array($meta))) {
            $meta = array();
        }

        $meta[$key] = $value;
        $this->meta = $meta;

        return $this;
    }

}
