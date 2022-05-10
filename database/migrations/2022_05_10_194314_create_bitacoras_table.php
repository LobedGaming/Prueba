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
            $table->dateTime('fecha');
            $table->string('accion');
            $table->string('implicado');
            $table->string('apartado');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('set null')
            ->onUpdate('set null');
        });

        DB::unprepared('
            create or replace procedure insertar_bitacora(
                d_fecha timestamp WITHOUT TIME ZONE,
                d_accion CHARACTER VARYING,
                d_implicado CHARACTER VARYING,
                d_apartado CHARACTER VARYING,
                d_user_id bigint
            )
            language sql
            as $$
                insert into bitacoras(fecha,accion, implicado, apartado, user_id)
                values(d_fecha, d_accion, d_implicado, d_apartado, d_user_id);
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
        DB::unprepared('drop procedure insertar_bitacora;');
    }
};
