<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSaldoColumnToCarteirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carteiras', function (Blueprint $table) {
            $table->float('saldo', 8, 2)->after('total_aplicado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carteiras', function (Blueprint $table) {
            $table->dropColumn('saldo');
        });
    }
}
