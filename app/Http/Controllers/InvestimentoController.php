<?php

namespace App\Http\Controllers;

use App\Investimento;
use App\TipoInvestimento;
use App\Carteira;
use Illuminate\Http\Request;

class InvestimentoController extends Controller
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
        $carteira_id = Carteira::where('user_id', auth()->user()->id)->first()->id;
        $investimentos = Investimento::where('carteira_id', $carteira_id)->paginate(10);
        return view('investimento.index', ['investimentos' => $investimentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_investimentos = TipoInvestimento::all();
        $carteira_id = Carteira::where('user_id', auth()->user()->id)->first()->id;
        return view('investimento.create', ['tipo_investimentos' => $tipo_investimentos, 'carteira_id' => $carteira_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Investimento::create($request->all());

        // altera qtd_investimentos e total_aplicado na Carteira
        $carteira = Carteira::find($request->carteira_id);
        $carteira->qtd_investimentos++;
        $carteira->total_aplicado += $request->capital_inicial;
        $carteira->save();

        return redirect()->route('investimento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Investimento  $investimento
     * @return \Illuminate\Http\Response
     */
    public function show(Investimento $investimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Investimento  $investimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Investimento $investimento)
    {
        dd($investimento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Investimento  $investimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investimento $investimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Investimento  $investimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investimento $investimento)
    {
        //
    }
}
