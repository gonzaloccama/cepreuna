<?php

namespace Database\Factories;

use App\Models\CategoryStatement;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryStatementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryStatement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->text($this->faker->numberBetween(8, 32)),
        ];
    }
}
