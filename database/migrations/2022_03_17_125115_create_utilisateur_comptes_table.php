<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateur_comptes', function (Blueprint $table) {
            $table
                ->foreign('id_compte')
                ->references('id')
                ->on('comptes')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table
                ->foreign('id_utilisateur')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->boolean('editeur');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateur_comptes');
    }
};
