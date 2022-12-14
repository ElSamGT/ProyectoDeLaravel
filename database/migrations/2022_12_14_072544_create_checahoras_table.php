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
        Schema::create('checahoras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idDia');
            $table->time('horaentrada');
            $table->timestamps();
            $table->foreign('idUser')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('idDia')
                ->references('id')
                ->on('dias')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checahoras');
    }
};
