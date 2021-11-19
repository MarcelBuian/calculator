<?php

namespace App\Services;

use App\Models\Number;

interface Operation
{
    public function name(): string;
    public function calculate(Number $a, Number $b): Number;
}
