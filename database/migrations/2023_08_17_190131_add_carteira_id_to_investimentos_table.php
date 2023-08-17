<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddCarteiraIdToInvestimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investimentos', function (Blueprint $table) {
            $table->unsignedBigInteger('carteira_id')->after('id');
        });

        DB::statement('update investimentos set carteira_id = 1');

        Schema::table('investimentos', function (Blueprint $table) {
            $table->foreign('carteira_id')->references('id')->on('carteiras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investimentos', function (Blueprint $table) {
            $table->dropForeign('investimentos_carteira_id_foreign');

            $table->dropColumn('carteira_id');
        });
    }
}
