<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dashboard\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image'                 => fake()->imageUrl(640, 480, 'human'),
            'name'                  => fake()->name(),
            'dob'                   => fake()->date(),
            'email'                 => fake()->safeEmail(),
            'phone'                 => fake()->phoneNumber(),
            'street'                => fake()->streetAddress(1, 60),
            'city_id'               => fake()->numberBetween(1,45000),
            'zip_code'              => fake()->postcode(10, 20),
        ];
    }
}
