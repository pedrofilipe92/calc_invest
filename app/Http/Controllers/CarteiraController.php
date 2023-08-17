<?php

namespace App\Http\Controllers;

use App\Carteira;
use App\TipoInvestimento;
use Illuminate\Http\Request;

class CarteiraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investimentos = Carteira::with('tipoInvestimento')->paginate(10);
        return view('carteira.index', ['investimentos' => $investimentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_investimentos = TipoInvestimento::all();
        return view('carteira.create', ['tipo_investimentos' => $tipo_investimentos]);
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
        Carteira::create($request->all());
        return redirect()->route('carteira.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carteira  $carteira
     * @return \Illuminate\Http\Response
     */
    public function show(Carteira $carteira)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carteira  $carteira
     * @return \Illuminate\Http\Response
     */
    public function edit(Carteira $carteira)
    {
        dd($carteira);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carteira  $carteira
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carteira $carteira)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carteira  $carteira
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carteira $carteira)
    {
        //
    }
}
