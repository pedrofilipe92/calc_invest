<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carteira extends Model
{
    protected $fillable = [
        'tipo_investimento_id',
        'capital_inicial',
        'prazo'
    ];

    public function tipoInvestimento() {
        return $this->belongsTo('App\TipoInvestimento');
    }
}
