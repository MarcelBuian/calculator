<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        $maxNumber = config('calculator.max_supported_value');

        $request->validate([
            'number_1' => "required|numeric|min:-{$maxNumber}|max:{$maxNumber}",
            'number_2' => "required|numeric|min:-{$maxNumber}|max:{$maxNumber}",
            'operation' => 'required|in:plus,minus,multiply,divide',
        ]);

        try {
            $result = $request->get('number_1') + $request->get('number_2');
            $session = ['result' => $result];
        } catch (\Exception $exception) {
            $session = $exception->getMessage();
        }

        return back()->withInput()->with($session);
    }
}
