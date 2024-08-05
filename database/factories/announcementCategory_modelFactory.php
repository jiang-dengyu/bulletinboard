<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\announcementCategory_model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\announcementCategory_modle>
 */
class announcementCategory_modelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = announcementCategory_model::class;
    public function definition(): array
    {
        return [
            'category_name' => $this->faker->word,
        ];
    }
}
