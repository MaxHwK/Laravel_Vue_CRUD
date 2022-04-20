<?php

namespace App\Models\Trait\Attributes;

/**
 * Trait ClientAttribute.
 */
trait ClientAttribute
{
    /**
     * @return string
     */
    public function getCountryNameAttribute()
    {
        return optional($this->pays)->libelle;
    }

}
