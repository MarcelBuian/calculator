<?php

namespace App\Models;

class Number
{
    /** @var float */
    private $value;

    public function __construct(float $value)
    {
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
