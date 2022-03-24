<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppModelsTransaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return ['intitule' => $this->faker->text(50),
            'description' => $this->faker->text(200),
            'montant' => $this->faker->numberBetween(-10000, 10000),
            'sens_transaction' => $this->faker->randomElement(['entrant', 'sortant']),
            'id_compte' => $this->faker->numberBetween(1, 5),
            'id_user' => $this->faker->numberBetween(1, 5),
            'id_categorie' => $this->faker->numberBetween(1, 5)
    ];
    }
}
