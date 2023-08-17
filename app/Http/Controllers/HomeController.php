<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoInvestimento;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_investimentos = TipoInvestimento::all();
        return view('index', ['tipo_investimentos' => $tipo_investimentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_investimentos = TipoInvestimento::all();
        $retorno = [
            'tipo_investimento'     => $request->tipo_investimento,
            'valor'                 => $request->valor,
            'prazo'                 => $request->prazo,
        ];

        // convertendo valores para porcentagem
        $rentabilidade_porcentagem = $request->rentabilidade / 100;
        $cdi_porcentagem = $request->cdi / 100;

        $rentabilidade_anual = $cdi_porcentagem * $rentabilidade_porcentagem;
        $rentabilidade_mensal = $rentabilidade_anual / 12;
        
        // calculando rendimento bruto
        $rendimento_mensal = 0;
        $rendimento_bruto = 0;
        $total_aplicacao = $retorno['valor'];
        for ($i = 1; $i <= $retorno['prazo']; $i++) {
            $rendimento_mensal = $total_aplicacao * $rentabilidade_mensal;
            $rendimento_bruto += $rendimento_mensal;
            $total_aplicacao += $rendimento_mensal;
        }
        $retorno['rendimento_bruto'] = $rendimento_bruto;
        $retorno['total_aplicacao'] = $total_aplicacao;

        // calculando imposto de renda
        if ($retorno['tipo_investimento'] == 'CDB') {
            if($retorno['prazo'] <= 6) {
                $ir = 0.225;
            } else if($retorno['prazo'] > 6 && $retorno['prazo'] <= 12) {
                $ir = 0.2;
            } else if ($retorno['prazo'] > 12 && $retorno['prazo'] <= 24) {
                $ir = 0.175;
            } else if ($retorno['prazo'] > 24) {
                $ir = 0.15;
            }
            $retorno['ir'] = $ir * 100 . '%';
            $retorno['rendimento_liquido'] = $rendimento_bruto - ($rendimento_bruto * $ir);
        } else {
            $retorno['ir'] = '0%';
            $retorno['rendimento_liquido'] = $rendimento_bruto;
        }

        return view('index', ['tipo_investimentos' => $tipo_investimentos, 'retorno' => $retorno]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
