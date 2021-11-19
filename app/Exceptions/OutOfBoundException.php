<?php

namespace App\Exceptions;

class OutOfBoundException extends OperationException
{
    public static function fromValue(float $value): self
    {
        $maxNumber = config('calculator.max_supported_value');
        $message = "Value {$value} exceeds the maximum allowed of {$maxNumber}";

        return new static($message);
    }
}
