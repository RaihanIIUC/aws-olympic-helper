<?php

namespace Database\Factories;

use Carbon\Carbon;
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
            'message' =>   'Et labore nostrum repellat tenetur facilis in quisquam. Ea et explicabo enim eveniet aut explicabo similique nulla.',
            'requestId' =>  '304.330.5912',
            'created_at' => $this->faker->dateTimeBetween('-2 days', '+0 days')
            //   'created_at' => new Carbon('2022-05-30')

        ];
    }
}
