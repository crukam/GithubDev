<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class DeveloperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'userName' => $this->faker->userName,
            'avatarUrl'=> $this->faker->Url
        ];
    }
}
