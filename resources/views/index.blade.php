@extends('layouts.basico')

@section('conteudo')
    <form action="{{ route('home.store') }}" method="post">
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

    @if (isset($retorno))
        Ao final do seu investimento de {{ $retorno['valor'] }} no {{ $retorno['tipo_investimento'] }} você terá {{ $retorno['total_aplicacao'] }}.
        O seu investimento terá incidência de {{ $retorno['ir'] }} de imposto de renda e terá um retorno líquido de {{ $retorno['rendimento_liquido'] }}.
    @endif    
@endsection
