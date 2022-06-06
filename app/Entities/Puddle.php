<?php

namespace App\Entities;

use App\Entities\Interfaces\Toy;

class Puddle implements Toy
{
    public function sound()
    {
        echo "whistle";
    }
}
