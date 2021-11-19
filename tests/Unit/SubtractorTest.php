<?php

namespace Tests\Unit;

use App\Exceptions\OutOfBoundException;
use App\Models\Number;
use App\Services\Subtractor;
use Tests\TestCase;

class SubtractorTest extends TestCase
{
    public function test_adder_operation()
    {
        $this->assertSame('minus', (new Subtractor)->operation());
    }

    public function test_adder_calculates_well()
    {
        $adder = new Subtractor;
        $result = $adder->calculate(new Number(-2.5), new Number(3.5));

        $this->assertSame(-6.0, $result->get());
    }

    public function test_adder_returns_out_of_bound_exception()
    {
        $this->expectException(OutOfBoundException::class);
        $this->expectExceptionMessage('-9 minus 2 exceeds the maximum allowed value of 10');

        config(['calculator.max_supported_value' => 10]);
        (new Subtractor)->calculate(new Number(-9), new Number(2));
    }
}
