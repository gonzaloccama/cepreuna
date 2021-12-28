<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_document' => $this->faker->text($this->faker->numberBetween(32, 64)),
            'file' => '1.pdf',
            'description' => $this->faker->text($this->faker->numberBetween(126, 240)),
            'is_url' => $this->faker->randomElement(['0', '1']),
            'url' => 'https://drive.google.com/file/d/1gHOXbHMqMmQgGnvFImJD9NjEW6PAv00G/view?usp=sharing',
            'category_document' => $this->faker->numberBetween(1, 3),
        ];
    }
}
