<?php

namespace App\Exceptions;

use App\Models\Number;
use App\Services\Calculator;
use App\Services\Operation;

class OutOfBoundException extends OperationException
{
    public static function fromValue(float $value): self
    {
        $maxNumber = Calculator::resolve()->getMaxSupportedValue();
        $message = "Value {$value} exceeds the maximum allowed of {$maxNumber}";

        return new static($message);
    }

    public static function fromNumbers(Operation $calculator, Number $number1, Number $number2): self
    {
        $maxNumber = Calculator::resolve()->getMaxSupportedValue();
        $message = "{$number1->get()} {$calculator->name()} {$number2->get()} "
            ."exceeds the maximum allowed value of {$maxNumber}"
        ;

        return new static($message);
    }
}
