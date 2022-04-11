<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Transaction;
use App\Models\Categorie;
use App\Models\Compte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();
        User::factory(1)
            ->asAdmin()
            ->create();
        User::factory(1)
            ->compteTest()
            ->create();

        $categories = ['Alimentation', 'Loisirs', 'Transports', 'Restauration', 'Loyer', 'Salaire'];
        foreach($categories as $category) {
            Categorie::factory()->create([
              'intitule' => $category,
            ]);
          }
        Compte::factory(10)->create();
        Transaction::factory(10)->create();
    }
}
