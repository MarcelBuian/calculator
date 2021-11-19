<?php

namespace Tests\Unit;

use App\Exceptions\OutOfBoundException;
use App\Models\Number;
use App\Services\Multiplier;
use Tests\TestCase;

class MultiplierTest extends TestCase
{
    public function test_multiplier_name()
    {
        $this->assertSame('multiply', (new Multiplier)->name());
    }

    public function test_multiplier_calculates_well()
    {
        $multiplier = new Multiplier;
        $result = $multiplier->calculate(new Number(10), new Number(-20));

        $this->assertSame(-200.0, $result->get());
    }

    public function test_multiplier_returns_out_of_bound_exception()
    {
        $this->expectException(OutOfBoundException::class);
        $this->expectExceptionMessage('6 multiply 2 exceeds the maximum allowed value of 10');

        config(['calculator.max_supported_value' => 10]);
        (new Multiplier)->calculate(new Number(6), new Number(2));
    }
}
