@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <form action="{{ route('calculadora.calcular') }}" method="post">
                @csrf
                <select name="tipo_investimento">
                    <option value="">---Selecione o investimento---</option>
                    @foreach ($tipo_investimentos as $tipo_investimento)
                        <option
                            value="{{ $tipo_investimento['tipo_investimento'] }}"
                            @if (isset($investimento))
                                {{ $tipo_investimento['tipo_investimento'] == $investimento->tipoInvestimento->tipo_investimento ? 'selected' : '' }}
                            @endif
        
                        >{{ $tipo_investimento['tipo_investimento'] }}
                        </option>
                    @endforeach
                </select>
                <input name="valor" type="text" placeholder="Valor" value="{{ $investimento->carteiraInvestimento->capital_investido ?? '' }}">
                <input name="taxa" type="text" placeholder="Taxa" value="{{ $investimento->taxa ?? '' }}">
                <input name="cdi" type="text" placeholder="CDI">
                <input name="vencimento" type="text" placeholder="Vencimento" value="{{ $investimento->vencimento ?? '' }}">
                <button class="btn-primary" type="submit">Calcular</button>
            </form>
        </div>
    </div>
@endsection
