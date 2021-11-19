<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalculateTest extends TestCase
{
    public function testNumber2IsRequired()
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

    public function testSuccess()
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
}
