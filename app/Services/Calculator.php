<?php

namespace App\Services;

use App\Models\Number;
use InvalidArgumentException;

class Calculator
{
    const OPERATIONS = [
        Adder::class,
        Subtractor::class,
        Multiplier::class,
        Divider::class,
    ];

    public static function resolve(): self
    {
        return resolve(self::class);
    }

    public function findOperationByName(string $name): Operation
    {
        foreach (self::OPERATIONS as $class) {
            /** @var Operation $operation */
            $operation = new $class;
            if ($operation->name() === $name) {
                return $operation;
            }
        }

        throw new InvalidArgumentException("Can not find an operation with name $name.");
    }

    /**
     * @throws \App\Exceptions\OutOfBoundException|\App\Exceptions\ZeroDivisionException
     * @throws InvalidArgumentException
     */
    public function calculateTwoFloatNumbers(float $number1Float, string $operationName, float $number2Float): float
    {
        $number1 = new Number($number1Float);
        $number2 = new Number($number2Float);
        $operation = $this->findOperationByName($operationName);
        $result = $operation->calculate($number1, $number2);

        return $result->get();
    }
}
