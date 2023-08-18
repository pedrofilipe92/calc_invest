<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarteiraInvestimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carteira_investimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carteira_id');
            $table->unsignedBigInteger('investimento_id');
            $table->float('capital_investido', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('carteira_id')->references('id')->on('carteiras');
            $table->foreign('investimento_id')->references('id')->on('investimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carteira_investimentos');
    }
}
