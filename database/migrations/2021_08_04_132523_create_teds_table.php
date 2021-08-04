<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teds', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->text('objeto');
            $table->string('ano');
            $table->string('acao')->nullable();
            $table->unsignedBigInteger('parlamentar_id');
            
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->foreign('parlamentar_id')->references('id')->on('parlamentars');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teds');
    }
}
