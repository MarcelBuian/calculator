<?php

namespace App\Services;

use App\Exceptions\OutOfBoundException;
use App\Models\Number;

class Multiplier implements Operation
{
    public function name(): string
    {
        return 'multiply';
    }

    /**
     * @throws OutOfBoundException
     */
    public function calculate(Number $a, Number $b): Number
    {
        $result = $a->get() * $b->get();
        if (abs($result) > config('calculator.max_supported_value')) {
            throw OutOfBoundException::fromNumbers($this, $a, $b);
        }

        return new Number($result);
    }
}
