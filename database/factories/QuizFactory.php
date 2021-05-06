<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quiz::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $strings = array(
            'option1',
            'option2',
        );
        $key = array_rand($strings);
        $finalOption = $strings[$key];
        return [
            'question' => $this->faker->sentence(10),
            'option1' => $this->faker->sentence(3),
            'option2' => $this->faker->sentence(3),
            'correct' => $finalOption
        ];
    }
}
