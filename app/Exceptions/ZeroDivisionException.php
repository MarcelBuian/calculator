<?php

namespace App\Exceptions;

use App\Models\Number;

class ZeroDivisionException extends OperationException
{
    public static function fromDividend(Number $dividend): self
    {
        return new static("Can't divide {$dividend->get()} by zero.");
    }
}
