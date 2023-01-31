<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'vehicle' => 'airplane',
            'period' => rand(3,8),
            'agency_id' => rand(1,3),
            'user_id' => rand(1,3),
            'price' => rand(10000 , 20000),
            'hotel_name' => fake()->name(),
            'hotel_rate' => rand(3,5),
            'is_active' => rand(0,1),
            'cover' => fake()->imageUrl(),
            'tourname' => fake()->domainName(),
            'description' => fake()->sentence(),
            'destination' => fake()->city()
        ];
    }
}
