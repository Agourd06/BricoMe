<?php

namespace Database\Factories;

use App\Models\Artisan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtisanFactory extends Factory
{
    protected $model = Artisan::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'description' => $this->faker->sentence,
            'job' => $this->faker->jobTitle,
            'photoTabs' => $this->faker->imageUrl(),
            'skills' => json_encode([$this->faker->word, $this->faker->word, $this->faker->word]),
            'multiplePhotos' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl(), $this->faker->imageUrl()]),
            'service1' => $this->faker->word,
            'tarif1' => $this->faker->randomNumber(2),
            'service2' => $this->faker->word,
            'tarif2' => $this->faker->randomNumber(2),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
