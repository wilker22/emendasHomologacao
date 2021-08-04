<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->text('descricao');
            
            $table->text('especificacoes')->nullable();
            $table->unsignedBigInteger('licitacao_id');
            $table->unsignedBigInteger('municipio_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('licitacao_id')->references('id')->on('licitas');
            $table->foreign('municipio_id')->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obras');
    }
}
