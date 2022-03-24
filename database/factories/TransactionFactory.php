<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Compte;
use App\Models\Categorie;
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
        $users = User::all()->pluck('id')->toArray();
        $comptes = Compte::all()->pluck('id')->toArray();
        $categories = Categorie::all()->pluck('id')->toArray();
        return ['intitule' => $this->faker->text(50),
            'description' => $this->faker->text(200),
            'montant' => $this->faker->numberBetween(-10000, 10000),
            'sens_transaction' => $this->faker->randomElement(['entrant', 'sortant']),
            'id_compte' => $this->faker->randomElement($comptes),
            'id_user' => $this->faker->randomElement($users),
            'id_categorie' => $this->faker->randomElement($categories)
    ];
    }
}
