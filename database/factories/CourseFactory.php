<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cd_coordenador' => $this->faker->randomDigitNotNull(),
            'ds_nome' => $this->faker->unique()->name(),
            'me_ementa' => $this->faker->text($maxNbChars = 100),
            'me_resumo' => $this->faker->text($maxNbChars = 200), // password
        ];
    }
}
