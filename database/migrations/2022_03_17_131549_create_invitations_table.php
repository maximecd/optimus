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
        Schema::create('invitations', function (Blueprint $table) {
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_invite');
            $table->unsignedBigInteger('id_compte');
            $table->primary(['id_admin', 'id_invite', 'id_compte']);

            $table
                ->foreign('id_admin')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table
                ->foreign('id_invite')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table
                ->foreign('id_compte')
                ->references('id')
                ->on('comptes')
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
        Schema::dropIfExists('invitations');
    }
};
