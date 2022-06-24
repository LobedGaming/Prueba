<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->string('apartado');
            $table->string('accion');
            $table->string('implicado');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('user_id');
            $table->string('nombre_usuario');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('set null')
            ->onUpdate('set null');
        });

        DB::unprepared('
        create or replace procedure insertar_bitacora(
            d_apartado CHARACTER VARYING,
            d_accion CHARACTER VARYING,
            d_implicado CHARACTER VARYING,
            d_fecha timestamp WITHOUT TIME ZONE,
            d_user_id bigint,
            d_nombre_usuario CHARACTER VARYING
        )
        language sql
        as $$
            insert into bitacoras(apartado, accion, implicado, fecha, user_id, nombre_usuario)
            values(d_apartado, d_accion, d_implicado, d_fecha, d_user_id, d_nombre_usuario);
        $$;
    ');

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacoras');
        DB::unprepared('drop procedure insertar_bitacora');
    }
};
