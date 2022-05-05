<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testJeremy()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Email')
                    ->type('email','admin@optimus.fr')
                    ->type('password','password')
                    ->press('SE CONNECTER')
                    ->assertSee('Vos comptes');
        });
    }

    public function testMaxime()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/')
            ->press('button#dropdown-settings')
            ->click('a[href="' . route('logout') . '"]')
            ->assertSee('SE CONNECTER');

        });
    }

    public function testMateo()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('email','admin@optimus.fr')
                    ->type('password','password')
                    ->press('SE CONNECTER')
                    ->visit('/compte/create')
                    ->type('intitule','Compte de test')
                    ->press('Créer')
                    ->assertSee('Compte de test');
        });
    }

}
