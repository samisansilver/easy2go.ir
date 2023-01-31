<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agency>
 */
class AgencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'agency_name' => fake()->company(),
            'username' => fake()->userName(),
            'password' => Hash::make('password'),
            'photo' => fake()->imageUrl(),
            'phone' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'mobile' => fake()->phoneNumber(),
            'is_active' => rand(0,1)
        ];
    }
}
