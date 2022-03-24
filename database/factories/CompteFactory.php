<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compte>
 */
class CompteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
        $users = User::all()->pluck('id')->toArray();
        return [
            'intitule' => "Compte n° " . $this->faker->unique->numberBetween(1,50) ,
            'id_admin' => $this->faker->randomElement($users),
        ];
    }
}
