<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course' => fake()->lastName,
            'course_mdl_id' => fake()->numberBetween(1,10),
            'enrollment_key' => fake()->uuid,
            'description' => fake()->sentence
        ];
    }
}
