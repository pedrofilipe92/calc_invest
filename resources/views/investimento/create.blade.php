@extends('layouts.app')

@section('content')
    <div>
        @include('investimento.layouts._partials.menu')
    </div>

    <div class="content">
        <div class="row justify-content-center">
            @if (isset($investimento))
                <form action="{{ route('investimento.update', ['investimento' => $investimento->id]) }}" method="post">
                    @method('PUT')
            @else
                <form action="{{ route('investimento.store') }}" method="post">
            @endif
                    @csrf
                    <select name="tipo_investimento_id">
                        <option value="">---Selecione o investimento---</option>
                        @foreach ($tipo_investimentos as $tipo_investimento)
                            <option
                                value="{{ $tipo_investimento['id'] }}"
                                @if (isset($investimento->tipo_investimento_id))
                                    {{ $investimento->tipo_investimento_id == $tipo_investimento['id'] ? 'selected' : '' }}
                                @endif

                                >{{ $tipo_investimento['tipo_investimento'] }}</option>
                        @endforeach
                    </select>
                    <input name="capital_min" type="text" placeholder="Capital Mínimo" value="{{ $investimento->capital_min ?? '' }}">
                    <input name="capital_max" type="text" placeholder="Capital Máximo" value="{{ $investimento->capital_max ?? '' }}">
                    <select name="pre_pos_fixado">
                        <option value="">---Selecione a fixação da taxa---</option>
                        <option 
                            value="PRE" 
                            {{ isset($investimento->pre_pos_fixado) && ($investimento->pre_pos_fixado == 'PRE') ? 'selected' : '' }}
                            
                            >Pré</option>
                        <option 
                            value="POS"
                            {{ isset($investimento->pre_pos_fixado) && ($investimento->pre_pos_fixado == 'POS') ? 'selected' : '' }}
                            
                            >Pós</option>
                    </select>
                    <input name="taxa" type="text" placeholder="Taxa" value="{{ $investimento->taxa ?? '' }}">
                    <input name="vencimento" type="text" placeholder="Vencimento" value="{{ $investimento->vencimento ?? '' }}">

                    @if (isset($investimento))
                        <button class="btn-primary" type="submit">Editar</button>    
                    @else
                        <button class="btn-primary" type="submit">Incluir</button>
                    @endif
            </form>
        </div>
    </div>
@endsection