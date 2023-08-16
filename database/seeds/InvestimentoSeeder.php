<?php

use Illuminate\Database\Seeder;
use App\Investimento;

class InvestimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Investimento::create(['investimento' => 'CDB']);
        Investimento::create(['investimento' => 'LCA']);
    }
}
