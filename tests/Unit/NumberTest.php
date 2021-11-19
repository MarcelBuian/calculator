<?php

namespace Tests\Unit;

use App\Models\Number;
use PHPUnit\Framework\TestCase;

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
}
