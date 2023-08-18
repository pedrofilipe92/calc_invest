<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carteira extends Model
{
    protected $fillable = [
        'user_id',
        // 'saldo',
        'qtd_investimentos',
        'total_aplicado',
    ];

    protected $with = ['user'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function investimentos() {
        return $this->belongsToMany('App\Investimento', 'carteira_investimentos');
    }
}
