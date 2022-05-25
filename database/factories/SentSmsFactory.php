<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SentSms>
 */
class SentSmsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'applicationId' => 'APP-1812264',
            'sourceAddress' =>  'APP-9864752',
            'message' => $this->faker->text(),
            'requestId' =>  '304.330.5912',
            // 'created_at' => $this->faker->dateTimeThisYear('+2 months')
        ];
    }
}
