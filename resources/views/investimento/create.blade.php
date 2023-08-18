@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <form action="{{ route('investimento.store') }}" method="post">
            @csrf
            <select name="tipo_investimento_id">
                <option value="">---Selecione o investimento---</option>
                @foreach ($tipo_investimentos as $tipo_investimento)
                    <option value="{{ $tipo_investimento['id'] }}">{{ $tipo_investimento['tipo_investimento'] }}</option>
                @endforeach
            </select>
            <input name="capital_min" type="text" placeholder="Capital Mínimo">
            <input name="capital_max" type="text" placeholder="Capital Máximo">
            <select name="pre_pos_fixado">
                <option value="">---Selecione a fixação da taxa---</option>
                <option value="PRE">Pré</option>
                <option value="POS">Pós</option>
            </select>
            <input name="taxa" type="text" placeholder="Taxa">
            <input name="vencimento" type="text" placeholder="Vencimento">
            <button type="submit">Incluir</button>
        </form>
    </div>
</div>
@endsection