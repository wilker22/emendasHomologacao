<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpenhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empenhos', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->date('data');
            $table->string('exercicio')->nullable();
            $table->string('objeto')->nullable();
            $table->string('entidade')->nullable();
            $table->string('cnpj')->unique()->nullable();
            $table->string('exercicio')->nullable();
            $table->string('processo')->nullable();
            $table->string('fonte')->nullable();
            $table->string('plano_interno')->nullable();
            $table->string('ptres')->nullable();
            $table->string('categoria_economica')->nullable();
            $table->string('natureza_despesa')->nullable();
            $table->string('modalidade_aplicacao')->nullable();
            $table->string('elemento_despesa')->nullable();
            $table->decimal('valor', 10,2)->nullable();
            $table->unsignedBigInteger('parlamentar_id')->nullable();
            $table->unsignedBigInteger('licitacao_id')->nullable();
            $table->unsignedBigInteger('instrumento_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parlamentar_id')->references('id')->on('parlamentars');
            $table->foreign('licitacao_id')->references('id')->on('licitas');
            $table->foreign('instrumento_id')->references('id')->on('instrumentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empenhos');
    }
}
