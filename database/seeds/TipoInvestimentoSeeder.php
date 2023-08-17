<?php

use Illuminate\Database\Seeder;
use App\TipoInvestimento;

class TipoInvestimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoInvestimento::create(['tipo_investimento' => 'CDB']);
        TipoInvestimento::create(['tipo_investimento' => 'LCA']);
        TipoInvestimento::create(['tipo_investimento' => 'TESOURO DIRETO']);
    }
}
