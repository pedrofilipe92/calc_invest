<?php

namespace App\Http\Controllers;

use App\Investimento;
use Illuminate\Http\Request;
use App\TipoInvestimento;

class CalculadoraController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_investimentos = TipoInvestimento::all();
        return view('calculadora.index', ['tipo_investimentos' => $tipo_investimentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_investimentos = TipoInvestimento::all();
        $investimento = Investimento::find($id);
        return view('calculadora.index', ['tipo_investimentos' => $tipo_investimentos, 'investimento' => $investimento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function calcular(Request $request) {
        $retorno = [
            'tipo' => $request->tipo_investimento,
            'valor_inicial' => $request->valor,
            'taxa' => ($request->taxa / 100) / 12,
            'cdi' => $request->cdi,
            'vencimento' => $request->vencimento,
        ];

        if ($retorno['tipo'] == 'CDB') {
            if ($retorno['vencimento'] <= 6) {
                $ir = 0.225;
            } elseif ($retorno['vencimento'] > 6 && $retorno['vencimento'] <= 12) {
                $ir = 0.2;
            } elseif ($retorno['vencimento'] > 12 && $retorno['vencimento'] <=24) {
                $ir = 0.175;
            } elseif ($retorno['vencimento'] > 24) {
                $ir = 0.15;
            }
            
            $retorno['taxa'] *= $request->cdi;
            $retorno['taxa'] /= 100;
        } elseif ($retorno['tipo'] == 'LCA') {
            $ir = 0;
        } else {
            $ir = 0.15;
        }

        $valor_aplicado = $retorno['valor_inicial'];
        $retorno['rendimento_bruto'] = 0;
        $retorno['rendimentos_mensais'] = [];
        for ($i = 1; $i <= $retorno['vencimento']; $i++) {
            $redimento_mensal = $valor_aplicado * $retorno['taxa'];
            $retorno['rendimento_bruto'] += $redimento_mensal;
            $valor_aplicado += $retorno['rendimento_bruto'];
            array_push($retorno['rendimentos_mensais'], $redimento_mensal);
        }

        $retorno['rendimento_liquido'] = $retorno['rendimento_bruto'] - ($retorno['rendimento_bruto'] * $ir);
        return view('calculadora.resultado', ['retorno' => $retorno]);
    }

    public function resultado() {

    }
}
