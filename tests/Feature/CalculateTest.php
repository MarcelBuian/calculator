<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalculateTest extends TestCase
{
    public function test_number_2_is_required()
    {
        $response = $this->postJson(route('calculate', [
            'number_1' => '100',
            'operation' => 'plus',
            'number_2' => '',
        ]));

        $response->assertStatus(422);
        $response->assertJsonValidationErrors([
            'number_2' => 'The number 2 field is required',
        ]);
    }

    public function test_success()
    {
        $response = $this->postJson(route('calculate', [
            'number_1' => '100',
            'operation' => 'plus',
            'number_2' => '200',
        ]));

        $response->assertStatus(302);
        $response->assertRedirect(route('welcome'));
        $response->assertSessionHas([
            'result' => 300,
        ]);
    }

    public function test_number_1_cant_be_too_small()
    {
        config(['calculator.max_supported_value' => 10]);
        $response = $this->postJson(route('calculate', [
            'number_1' => '-11',
            'operation' => 'plus',
            'number_2' => '-10',
        ]));

        $response->assertStatus(422);
        $response->assertJsonValidationErrors([
            'number_1' => 'The number 1 must be at least -10',
        ]);
        $response->assertJsonMissingValidationErrors(['number_2']);
    }

    public function test_number_2_cant_be_too_big()
    {
        config(['calculator.max_supported_value' => 999]);
        $response = $this->postJson(route('calculate', [
            'number_1' => '999',
            'operation' => 'plus',
            'number_2' => '1000',
        ]));

        $response->assertStatus(422);
        $response->assertJsonValidationErrors([
            'number_2' => 'The number 2 must not be greater than 999',
        ]);
        $response->assertJsonMissingValidationErrors(['number_1']);
    }
}
