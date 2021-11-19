<?php

namespace App\Services;

use App\Models\Number;

interface Calculator
{
    public function operation(): string;
    public function calculate(Number $a, Number $b): Number;
}
