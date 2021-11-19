<?php

namespace App\Services;

use App\Exceptions\ZeroDivisionException;
use App\Models\Number;

class Divider implements Calculator
{
    public function operation(): string
    {
        return 'divide';
    }

    /**
     * @throws ZeroDivisionException
     */
    public function calculate(Number $a, Number $b): Number
    {
        if ($b->isZero()) {
            throw ZeroDivisionException::fromDividend($a);
        }
        $result = $a->get() / $b->get();

        return new Number($result);
    }
}
