<?php

namespace Database\Factories;

use App\Models\CategoryEmployment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryEmploymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryEmployment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->text($this->faker->numberBetween(32, 56)),
        ];
    }
}
