<?php

namespace App\Models\Trait\Attributes;

/**
 * Trait ProjectAttribute.
 */
trait ProjectAttribute
{
    /**
     * @return string
     */
    public function getClientNameAttribute()
    {
        return optional($this->client)->nom;
    }

}
