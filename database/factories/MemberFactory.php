<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    
    protected $model = Member::class;

    public function definition(): array
    {
        return [
            'name'      => $this->faker->name,
            'birthdate' => $this->faker->date('Y-m-d', '2000-01-01'),
            'birthtime' =>$this->faker->time('H:i'), 
            'phone'     => $this->faker->phoneNumber,
            'address'   => $this->faker->address,
            'email'     =>$this->faker->safeEmail,
        ];
    }
}
