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
        Schema::create('reporte', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idChec');
            $table->timestamps();
            $table->foreign('idUser')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('idChec')
                ->references('id')
                ->on('checahoras')
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
        Schema::dropIfExists('reporte');
    }
};
