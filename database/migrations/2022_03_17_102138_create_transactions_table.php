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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->string('description', 300);
            $table->decimal('montant', 10, 2);
            $table->enum('sens_transaction', ['entrant', 'sortant']);

            $table->unsignedBigInteger('id_compte');
            $table
                ->foreign('id_compte')
                ->references('id')
                ->on('comptes')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('id_user');
            $table
                ->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('id_categorie');
            $table
                ->foreign('id_categorie')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');

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
