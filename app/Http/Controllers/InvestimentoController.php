<?php

namespace App\Http\Controllers;

use App\Investimento;
use App\TipoInvestimento;
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
        $investimentos = Investimento::paginate(10);
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
        $tipo_investimentos = TipoInvestimento::all();
        return view('investimento.create', ['tipo_investimentos' => $tipo_investimentos, 'investimento' => $investimento]);
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
        $investimento->update($request->all());
        return redirect()->route('investimento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Investimento  $investimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investimento $investimento)
    {
        $investimento->delete();
        return redirect()->route('investimento.index');
    }
}
