<?php

namespace App\Http\Controllers;

use App\Investimento;
use App\TipoInvestimento;
use Illuminate\Http\Request;

class InvestimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investimentos = Investimento::with('tipoInvestimento')->paginate(10);
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
        return view('investimento.create', ['tipo_investimentos' => $tipo_investimentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Investimento::create($request->all());
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
