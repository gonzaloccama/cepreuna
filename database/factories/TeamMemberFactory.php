<?php

namespace Database\Factories;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TeamMember::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'names' => $this->faker->name,
            'image' => '1.png',
            'email' => $this->faker->email,
            'facebook' => $this->faker->url,
            'twitter' => $this->faker->url,
            'whatsapp' => $this->faker->biasedNumberBetween(911111111, 999999999),
            'biography' => $this->faker->text(400),
        ];
    }
}
