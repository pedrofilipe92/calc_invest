@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <form action="{{ route('calculadora.store') }}" method="post">
                @csrf
                <select name="tipo_investimento">
                    <option value="">---Selecione o investimento---</option>
                    @foreach ($tipo_investimentos as $tipo_investimento)
                        <option value="{{ $tipo_investimento['tipo_investimento'] }}">{{ $tipo_investimento['tipo_investimento'] }}</option>
                    @endforeach
                </select>
                <input name="valor" type="text" placeholder="Valor">
                <input name="rentabilidade" type="text" placeholder="Rentabilidade">
                <input name="cdi" type="text" placeholder="CDI Hoje">
                <input name="prazo" type="text" placeholder="Prazo">
                <button type="submit">Calcular</button>
            </form>
        </div>
    </div>
@endsection
