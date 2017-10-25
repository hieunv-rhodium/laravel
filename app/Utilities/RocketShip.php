<?php

namespace App\Utilities;

use App\Utilities\Contracts\RocketShipContract;

class RocketShip implements RocketShipContract
{

    public function blastOff()
    {

        return 'Houston, we have ignition';

    }

}