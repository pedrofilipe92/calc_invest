<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carteira extends Model
{
    protected $fillable = [
        'user_id',
        'qtd_investimentos',
        'total_aplicado',
        'saldo',
    ];

    protected $with = ['user'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function investimentos() {
        return $this->belongsToMany('App\Investimento', 'carteira_investimentos');
    }
}
