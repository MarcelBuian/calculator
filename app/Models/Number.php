<?php

namespace App\Models;

class Number
{
    /** @var float */
    private $number;

    public function __construct(float $number)
    {
        $this->number = $number;
    }

    public function get(): float
    {
        return $this->number;
    }

    public function isZero(): bool
    {
        return $this->number == 0;
    }
}
