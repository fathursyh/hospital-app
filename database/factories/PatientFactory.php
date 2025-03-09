<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = ['m', 'w'];
        $status = ['book', 'taken', 'done'];
        return [
            'fullname' => fake()->name(),
            'email' => fake()->unique()->email(),
            'date' => fake()->dateTimeBetween('today', '+1 month'),
            'gender' => $gender[rand(0,1)],
            'phone' => fake('id_ID')->phoneNumber(),
            'address' => fake()->address(),
            'reason' => fake()->paragraph(2),
            'status' => $status[rand(0,2)]
        ];
    }
}
