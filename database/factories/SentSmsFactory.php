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
            'applicationId' => $this->faker->numerify('APP-#######'),
            'sourceAddress' => $this->faker->numerify('APP-#######'),
            'message' => $this->faker->text(),
            'requestId' => $this->faker->phoneNumber(),
            // 'created_at' => $this->faker->dateTimeThisYear('+2 months')
        ];
    }
}
