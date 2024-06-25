<?php

namespace Database\Factories;

use App\Models\Klant;
use Illuminate\Database\Eloquent\Factories\Factory;

class KlantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Klant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naam' => $this->faker->name,
            'telefoonnummer' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'aantal_volwassenen' => $this->faker->numberBetween($min = 1, $max = 5),
            'aantal_kinderen' => $this->faker->numberBetween($min = 0, $max = 5),
            'aantal_baby' => $this->faker->numberBetween($min = 0, $max = 3),
            'voedselwensen' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'voedselpakketId' => $this->faker->numberBetween($min = 1, $max = 50),
            'adressId' => $this->faker->numberBetween($min = 1, $max = 50),
        ];
    }
}
