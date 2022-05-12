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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_hora', 1)->nullable(false);
            $table->text('description')->nullable(false);
            $table->unsignedBigInteger('id_doctor')->nullable(false);
            $table->unsignedBigInteger('id_secretarie')->nullable(false);
            $table->unsignedBigInteger('id_patient')->nullable(false);

            $table->foreign('id_doctor')->references('id_user')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_secretarie')->references('id_user')->on('secretaries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_patient')->references('id_user')->on('patients')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('citas');
    }
};
