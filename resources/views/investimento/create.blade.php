@extends('layouts.basico')

@section('conteudo')
    <form action="{{ route('investimento.store') }}" method="post">
        @csrf
        <select name="tipo_investimento_id">
            <option value="">---Selecione o investimento---</option>
            @foreach ($tipo_investimentos as $tipo_investimento)
                <option value="{{ $tipo_investimento['id'] }}">{{ $tipo_investimento['tipo_investimento'] }}</option>
            @endforeach
        </select>
        <input name="capital_inicial" type="text" placeholder="Capital a ser aplicado">
        <input name="prazo" type="text" placeholder="Prazo">
        <button type="submit">Investir</button>
    </form>
@endsection