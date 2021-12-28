<?php

namespace Database\Factories;

use App\Models\CycleAcademy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CycleAcademyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CycleAcademy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cicle' => ucfirst($this->faker->text(30)),
            'start_register' =>$this->faker->dateTimeBetween('2021-01-15', '2021-12-01'),
            'finish_register' => $this->faker->dateTimeBetween('2021-06-15', '2021-12-31'),
            'start_class' => $this->faker->dateTimeBetween('2021-01-15', '2021-12-01'),
            'finish_class' => $this->faker->dateTimeBetween('2021-06-15', '2021-12-31'),
            'requires' => '',
            'go_link' => $this->faker->url(),
            'image' => $this->faker->imageUrl(1281,1920),
            'price' => '',
            'horary' => '',
            'status' => '0',
        ];
    }
}
