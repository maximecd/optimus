<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
<<<<<<< HEAD
                    ->assertSee('Laravel');
=======
                    ->assertSee('Email')
                    ->type('email','admin@optimus.fr')
                    ->type('password','password')
                    ->press('SE CONNECTER')
                    ->assertSee('Vos comptes');
>>>>>>> bc5c4c4214884067cf0457bb6db3ae8ffadb63db
        });
    }
}
