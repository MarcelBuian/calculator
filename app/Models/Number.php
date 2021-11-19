<?php

namespace App\Models;

use App\Exceptions\OutOfBoundException;

class Number
{
    /** @var float */
    private $value;

    /**
     * @throws OutOfBoundException
     */
    public function __construct(float $value)
    {
        if (abs($value) > config('calculator.max_supported_value')) {
            throw OutOfBoundException::fromValue($value);
        }
        $this->value = $value;
    }

    public function get(): float
    {
        return $this->value;
    }

    public function isZero(): bool
    {
        return $this->value == 0;
    }
}
