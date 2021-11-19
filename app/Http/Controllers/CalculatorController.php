<?php

namespace App\Http\Controllers;

use App\Exceptions\OperationException;
use App\Services\Calculator;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(Request $request, Calculator $calculator)
    {
        $maxNumber = config('calculator.max_supported_value');

        $request->validate([
            'number_1' => "required|numeric|min:-{$maxNumber}|max:{$maxNumber}",
            'number_2' => "required|numeric|min:-{$maxNumber}|max:{$maxNumber}",
            'operation' => 'required|in:plus,minus,multiply,divide',
        ]);

        $number1 = $request->input('number_1');
        $number2 = $request->input('number_2');
        $operation = $request->input('operation');

        try {
            $result = $calculator->calculateTwoFloatNumbers($number1, $operation, $number2);
            $session = ['result' => $result];
        } catch (OperationException $exception) {
            $session = $exception->getMessage();
        }

        return back()->withInput()->with($session);
    }
}
