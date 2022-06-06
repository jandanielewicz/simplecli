<?php

namespace App\Entities;

use App\Entities\Interfaces\Toy;

class Plushmops implements Toy
{
    public function sound()
    {
        return false;
    }
}
