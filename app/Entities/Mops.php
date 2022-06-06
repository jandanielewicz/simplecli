<?php

namespace App\Entities;

use App\Exception\ActionNotPossibleException;
use App\Traits\MakesSound;
use App\Entities\Interfaces\Animal;

class Mops implements Animal
{
    use MakesSound;

    public function hunt()
    {
        throw new ActionNotPossibleException('too lazy');
    }
}
