<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admission>
 */
class admissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 3,
            'student_id' => 3,
            'firstname' => fake()->firstName,
            'lastname' => fake()->lastName,
            'middlename' => fake()->lastName,
            'course' => fake()->word,
            'email' => fake()->email(),
            'contactnumber' => fake()->numberBetween(1,11),
            'country'=> fake()->country,
            'streetaddress' =>fake()->streetAddress(),
            'city' =>fake()->city,
            'fathername'=> fake()->name(),
            'mothername' => fake()->name(),
            'guardiancontactnumber' => fake()->numberBetween(1, 11),
        ];
    }
}
