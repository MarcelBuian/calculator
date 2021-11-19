<?php

namespace App\Services;

use App\Exceptions\OutOfBoundException;
use App\Exceptions\ZeroDivisionException;
use App\Models\Number;

interface Operation
{
    public function name(): string;

    /**
     * @throws ZeroDivisionException
     * @throws OutOfBoundException
     */
    public function calculate(Number $a, Number $b): Number;
}
