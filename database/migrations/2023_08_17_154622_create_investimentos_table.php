<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_investimento_id');
            $table->float('capital_inicial', 8, 2);
            $table->integer('prazo');
            $table->timestamps();

            $table->foreign('tipo_investimento_id')->references('id')->on('tipo_investimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investimentos');
    }
}
