<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInvestimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investimentos', function (Blueprint $table) {
            $table->dropForeign('investimentos_carteira_id_foreign');
            $table->dropColumn('carteira_id');

            $table->float('capital_min', 8, 2)->after('tipo_investimento_id');
            $table->float('capital_max', 8, 2)->after('tipo_investimento_id');
            $table->string('pre_pos_fixado', 3)->after('capital_inicial');
            $table->float('taxa', 8, 2)->after('capital_inicial');
            $table->integer('vencimento')->after('capital_inicial');

            $table->dropColumn('capital_inicial');
            $table->dropColumn('prazo');
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
            $table->integer('prazo');
            $table->double('capital_inicial', 8, 2);

            $table->dropColumn('capital_min');
            $table->dropColumn('capital_max');
            $table->dropColumn('pre_pos_fixado');
            $table->dropColumn('taxa');
            $table->dropColumn('vencimento');

            $table->unsignedBigInteger('carteira_id');
            $table->foreign('carteira_id')->references('id')->on('carteiras');
        });
    }
}
