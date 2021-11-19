<?php

namespace App\Services;

use App\Exceptions\OutOfBoundException;
use App\Models\Number;

class Adder implements Operation
{
    public function name(): string
    {
        return 'plus';
    }

    /**
     * @throws OutOfBoundException
     */
    public function calculate(Number $a, Number $b): Number
    {
        $result = $a->get() + $b->get();
        if (abs($result) > Calculator::resolve()->getMaxSupportedValue()) {
            throw OutOfBoundException::fromNumbers($this, $a, $b);
        }

        return new Number($result);
    }
}
