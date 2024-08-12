<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\announcement_model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class announcement_modelFactory extends Factory
{
    protected $model = announcement_model::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'announcement_title' => fake()->sentence(6, true),
            'content' => fake()->paragraph(),
            'attachment' =>  fake()->filePath(),
            'image' => fake()->filePath(),
            'stage' =>  fake()->boolean(),
            'announcement_category_id' =>  fake()->numberBetween(1, 3),
            'department' =>  fake()->word(),
            'publish_date' => fake()->dateTimeBetween('-1 month', '+1 month'),
            'remove_date' =>  fake()->dateTimeBetween('+1 month', '+2 months'),
        ];
    }
}
