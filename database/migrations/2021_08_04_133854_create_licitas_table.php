<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitas', function (Blueprint $table) {
            $table->id();
            $table->string('edital')->unique();
            $table->string('ano');
            $table->string('modalidade')->nullable();
            $table->string('vencedor')->nullable();
            $table->text('objeto')->nullable();
            $table->string('processo')->nullable();
            $table->string('area_origem')->nullable();
            $table->date('data_publicacao')->nullable();
            $table->text('situacao')->nullable();
            $table->decimal('valor_orcado', 10,2)->nullable();
            $table->decimal('valor_adjudicado', 10,2)->nullable();

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licitas');
    }
}
