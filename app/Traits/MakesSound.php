<?php

namespace App\Traits;

trait MakesSound
{
    /**
     * @param string $type
     * @return string
     */
    public function sound(string $type = 'bark') :string
    {
        return $type ?: "bark";
    }
}
