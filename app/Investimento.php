<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investimento extends Model
{
    protected $fillable = [
        'tipo_investimento_id',
        'capital_min',
        'capital_max',
        'pre_pos_fixado',
        'taxa',
        'vencimento',
    ];

    protected $with = ['tipoInvestimento'];

    public function tipoInvestimento() {
        return $this->belongsTo('App\TipoInvestimento');
    }

    public function carteiras() {
        return $this->belongsToMany('App\Carteira', 'carteira_investimentos');
    }
}
