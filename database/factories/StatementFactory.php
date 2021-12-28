<?php

namespace Database\Factories;

use App\Models\Statement;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Statement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text($this->faker->numberBetween(18, 36)),
            'file' => '1.pdf',
            'is_url' => $this->faker->randomElement(['0', '1']),
            'url' => 'https://drive.google.com/file/d/149Y1l7b-rG5jEGEKfFLNrfeZmgAH5UMi/view?usp=sharing',
            'category_statement' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->text($this->faker->numberBetween(100, 360)),
        ];
    }
}
