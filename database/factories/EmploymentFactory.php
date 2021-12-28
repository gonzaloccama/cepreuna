<?php

namespace Database\Factories;

use App\Models\Employment;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmploymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $schedule = [
            ['detalle' => $this->faker->text(30), 'fecha' => $this->faker->date('2021-08-10'). ' al ' .$this->faker->date('2021-12-10')],
            ['detalle' => $this->faker->text(30), 'fecha' => $this->faker->date('2021-08-10'). ' al ' .$this->faker->date('2021-12-10')],
            ['detalle' => $this->faker->text(30), 'fecha' => $this->faker->date('2021-08-10'). ' al ' .$this->faker->date('2021-12-10')],
            ['detalle' => $this->faker->text(30), 'fecha' => $this->faker->date('2021-08-10'). ' al ' .$this->faker->date('2021-12-10')],
            ['detalle' => $this->faker->text(30), 'fecha' => $this->faker->date('2021-08-10'). ' al ' .$this->faker->date('2021-12-10')],
            ['detalle' => $this->faker->text(30), 'fecha' => $this->faker->date('2021-08-10'). ' al ' .$this->faker->date('2021-12-10')],
            ['detalle' => $this->faker->text(30), 'fecha' => $this->faker->date('2021-08-10'). ' al ' .$this->faker->date('2021-12-10')],
            ['detalle' => $this->faker->text(30), 'fecha' => $this->faker->date('2021-08-10'). ' al ' .$this->faker->date('2021-12-10')],
            ['detalle' => $this->faker->text(30), 'fecha' => $this->faker->date('2021-08-10'). ' al ' .$this->faker->date('2021-12-10')],
            ['detalle' => $this->faker->text(30), 'fecha' => $this->faker->date('2021-08-10'). ' al ' .$this->faker->date('2021-12-10')],
            ['detalle' => $this->faker->text(30), 'fecha' => $this->faker->date('2021-08-10'). ' al ' .$this->faker->date('2021-12-10')],
        ];

        $files = [
            ['descripcion' => $this->faker->text(32), 'file' => 'https://drive.google.com/file/d/1gHOXbHMqMmQgGnvFImJD9NjEW6PAv00G/view?usp=sharing'],
            ['descripcion' => $this->faker->text(32), 'file' => 'https://drive.google.com/file/d/1gHOXbHMqMmQgGnvFImJD9NjEW6PAv00G/view?usp=sharing'],
            ['descripcion' => $this->faker->text(32), 'file' => 'https://drive.google.com/file/d/1gHOXbHMqMmQgGnvFImJD9NjEW6PAv00G/view?usp=sharing'],
            ['descripcion' => $this->faker->text(32), 'file' => 'https://drive.google.com/file/d/1gHOXbHMqMmQgGnvFImJD9NjEW6PAv00G/view?usp=sharing'],
            ['descripcion' => $this->faker->text(32), 'file' => 'https://drive.google.com/file/d/1gHOXbHMqMmQgGnvFImJD9NjEW6PAv00G/view?usp=sharing'],
            ['descripcion' => $this->faker->text(32), 'file' => 'https://drive.google.com/file/d/1gHOXbHMqMmQgGnvFImJD9NjEW6PAv00G/view?usp=sharing'],
            ['descripcion' => $this->faker->text(32), 'file' => 'https://drive.google.com/file/d/1gHOXbHMqMmQgGnvFImJD9NjEW6PAv00G/view?usp=sharing'],
        ];

        return [
            'title' => $this->faker->text($this->faker->numberBetween(32, 64)),
            'description' => $this->faker->text($this->faker->numberBetween(124, 360)),
            'requires' => '',
            'file_employment' => '1.pdf',
            'start_employments' => $this->faker->dateTimeBetween('2021-10-01', '2021-11-31'),
            'end_employments' => $this->faker->dateTimeBetween('2021-10-01', '2021-11-31'),
            'schedule' => json_encode($schedule),
            'go_link' => $this->faker->url(),
            'status' => $this->faker->randomElement(['0','1']),
            'files' => json_encode($files),
            'category_employment' => $this->faker->numberBetween(1, 5),
        ];
    }
}
