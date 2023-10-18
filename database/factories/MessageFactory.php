<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        return [
            'slug'=>  $this->faker->word(),
            'user_id'=>\rand(4,36),
            'destinator'=>\rand(4,60),
            'content'=>  $this->faker->sentence(45),
        ];
    }
}
