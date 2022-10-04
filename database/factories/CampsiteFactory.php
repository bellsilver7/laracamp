<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campsite>
 */
class CampsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'thumbnail' => $this->faker->imageUrl(),
            'doName' => $this->faker->randomElement(['서울', '경기', '강원', '인천', '충청', '전라', '경상', '제주']),
            'sigunguName' => $this->faker->text(),
            'tel' => $this->faker->phoneNumber(),
        ];
    }
}
