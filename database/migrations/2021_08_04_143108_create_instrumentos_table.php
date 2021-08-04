<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumentos', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->string('tipo')->nullable();
            $table->text('objeto')->nullable();
            $table->date('data_celebracao')->nullable();
            $table->unsignedBigInteger('licitacao_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('licitacao_id')->references('id')->on('licitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrumentos');
    }
}
