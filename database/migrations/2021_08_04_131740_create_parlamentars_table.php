<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParlamentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parlamentars', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('tipo')->nullable();
            $table->unsignedBigInteger('partido_id')->nullable();
            $table->unsignedBigInteger('bancada_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->foreign('partido_id')->references('id')->on('partidos');
            $table->foreign('bancada_id')->references('id')->on('bancadas');
            $table->foreign('estado_id')->references('id')->on('estados');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parlamentars');
    }
}
