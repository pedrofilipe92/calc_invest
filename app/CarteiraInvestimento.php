<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarteiraInvestimento extends Model
{
    protected $fillable = ['carteira_id', 'investimento_id', 'capital_investido'];
}
