<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedads', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('zona_id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('domicilio');
            $table->UnsignedBigInteger('numero');
            $table->UnsignedBigInteger('cp');
            $table->UnsignedBigInteger('precio');
            $table->UnsignedBigInteger('area');
            $table->UnsignedBigInteger('camas');
            $table->UnsignedBigInteger('cuartos');
            $table->UnsignedBigInteger('baños');
            $table->UnsignedBigInteger('telefono');
            $table->timestamps();

            $table->foreign('zona_id')
                ->references('id')
                ->on('zonas');

                $table->foreign('user_id')
                ->references('id')
                ->on('users');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propiedads');
    }
}
