<?php

namespace App\Exceptions;

use App\Models\Number;
use App\Services\Calculator;

class OutOfBoundException extends OperationException
{
    public static function fromValue(float $value): self
    {
        $maxNumber = config('calculator.max_supported_value');
        $message = "Value {$value} exceeds the maximum allowed of {$maxNumber}";

        return new static($message);
    }

    public static function fromNumbers(Calculator $calculator, Number $number1, Number $number2): self
    {
        $maxNumber = config('calculator.max_supported_value');
        $message = "{$number1->get()} {$calculator->operation()} {$number2->get()} "
            ."exceeds the maximum allowed value of {$maxNumber}"
        ;

        return new static($message);
    }
}