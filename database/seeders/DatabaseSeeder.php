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
        Categorie::factory(10)->create();
        Compte::factory()
            ->has(User::factory()->count(5))
            ->count(10)
            ->create();
        //$ids = range(1, 10);
        //Transaction::factory(10)->create();
        // Transaction::factory()->count(10)->create()->each(function ($transaction) use ($ids) {
        //     shuffle($ids);
        //     $transaction->id_compte()->attach(array_slice($ids, 0, rand(1, 1)));
        //     $transaction->id_user()->attach(array_slice($ids, 0, rand(1, 1)));
        //     $transaction->id_categorie()->attach(array_slice($ids, 0, rand(1, 1)));
        // });
    }
}
