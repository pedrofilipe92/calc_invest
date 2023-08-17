<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investimento extends Model
{
    protected $fillable = [
        'carteira_id',
        'tipo_investimento_id',
        'capital_inicial',
        'prazo'
    ];

    protected $with = ['tipoInvestimento'];

    public function tipoInvestimento() {
        return $this->belongsTo('App\TipoInvestimento');
    }

    public function carteira() {
        return $this->belongsTo('App\Carteira');
    }
}
