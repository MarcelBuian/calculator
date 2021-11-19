<?php

namespace Tests\Unit;

use App\Services\Adder;
use App\Services\Calculator;
use App\Services\Divider;
use App\Services\Multiplier;
use App\Services\Subtractor;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
    public function test_find_operation_name()
    {
        $this->assertInstanceOf(Adder::class, Calculator::resolve()->findOperationByName('plus'));
        $this->assertInstanceOf(Subtractor::class, Calculator::resolve()->findOperationByName('minus'));
        $this->assertInstanceOf(Multiplier::class, Calculator::resolve()->findOperationByName('multiply'));
        $this->assertInstanceOf(Divider::class, Calculator::resolve()->findOperationByName('divide'));
    }

    public function test_cant_find_operation_name()
    {
        $this->expectExceptionMessage('Can not find an operation with name unknown.');
        Calculator::resolve()->findOperationByName('unknown');
    }

    public function calculatorData()
    {
        return [
            [1, 'plus', 2.5, 3.5],
            [5, 'minus', 10, -5.0],
            [3.3, 'multiply', 2, 6.6],
            [5, 'divide', 2, 2.5],
        ];
    }

    /**
     * @dataProvider calculatorData
     */
    public function test_calculate_two_float_numbers(float $number1, string $operation, float $number2, float $result)
    {
        $this->assertSame($result, Calculator::resolve()->calculateTwoFloatNumbers($number1, $operation, $number2));
    }
}
