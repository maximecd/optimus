<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->string('description');
            $table->Integer('montant');
            $table->string('sens_transaction');
            $table->dateTime('datetime');

            $table->unsignedBigInteger('compte_id')->nullable();
            $table->foreign('compte_id')->references('id')
                ->on('compte')
                ->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id')->references('id')
                ->on('categorie')
                ->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('transactions');
        Schema::disableForeignKeyConstraints(); 
    }
};