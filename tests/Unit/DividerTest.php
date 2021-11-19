<?php

namespace Tests\Unit;

use App\Exceptions\OperationException;
use App\Exceptions\ZeroDivisionException;
use App\Models\Number;
use App\Services\Divider;
use Tests\TestCase;

class DividerTest extends TestCase
{
    public function test_divider_name()
    {
        $this->assertSame('divide', (new Divider())->name());
    }

    public function test_divider_calculates_well()
    {
        $divider = new Divider();
        $result = $divider->calculate(new Number(21), new Number(2));

        $this->assertSame(10.5, $result->get());
    }

    public function test_divider_returns_zero_divisor_exception()
    {
        $this->expectException(ZeroDivisionException::class);
        $this->expectException(OperationException::class);
        $this->expectExceptionMessage('Can\'t divide 6 by zero.');

        config(['calculator.max_supported_value' => 10]);
        (new Divider())->calculate(new Number(6), new Number(0));
    }
}
