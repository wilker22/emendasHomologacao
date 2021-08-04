<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emendas', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->string('tipo');
            $table->string('ano');
            $table->text('titulo')->nullable();
            $table->text('acao')->nullable();
            $table->string('programa_trabalho')->nullable();
            $table->string('plano_interno')->nullable();
            $table->string('ptres')->nullable();
            $table->decimal('valor_aprovado', 10,2)->nullable();
            $table->decimal('valor_empenhado', 10,2)->nullable();
            $table->decimal('valor_descentralizado', 10,2)->nullable();
            $table->decimal('valor_liquidado', 10,2)->nullable();
            $table->decimal('valor_pago', 10,2)->nullable();
                        
            $table->unsignedBigInteger('parlamentar_id')->nullable();
            $table->unsignedBigInteger('bancada_id')->nullable();
            
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->foreign('parlamentar_id')->references('id')->on('parlamentars');
            $table->foreign('bancada_id')->references('id')->on('bancadas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emendas');
    }
}
