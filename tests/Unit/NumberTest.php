<?php

namespace Tests\Unit;

use App\Exceptions\OperationException;
use App\Exceptions\OutOfBoundException;
use App\Models\Number;
use Tests\TestCase;

class NumberTest extends TestCase
{
    public function test_a_number_can_be_created()
    {
        $number = new Number(5.00);

        $this->assertSame(5.0, $number->get());
        $this->assertFalse($number->isZero());
    }

    public function test_is_zero_function()
    {
        $number = new Number(0);

        $this->assertSame(0.0, $number->get());
        $this->assertTrue($number->isZero());
    }

    public function test_value_is_too_small()
    {
        config(['calculator.max_supported_value' => 5]);

        $this->expectException(OutOfBoundException::class);
        $this->expectException(OperationException::class);
        $this->expectExceptionMessage('Value -5.01 exceeds the maximum allowed of 5');
        new Number(-5.01);
    }

    public function test_value_is_too_big()
    {
        config(['calculator.max_supported_value' => 3.1]);

        $this->expectException(OutOfBoundException::class);
        $this->expectException(OperationException::class);
        $this->expectExceptionMessage('Value 4 exceeds the maximum allowed of 3.1');
        new Number(4);
    }
}
