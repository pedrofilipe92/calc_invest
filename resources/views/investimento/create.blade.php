@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <form action="{{ route('investimento.store') }}" method="post">
            @csrf
            <input name="carteira_id" type="text" value="{{ $carteira_id }}" hidden>
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
    </div>
</div>
@endsection