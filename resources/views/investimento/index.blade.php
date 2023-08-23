@extends('layouts.app')

@section('content')
    <div>
        @include('investimento.layouts._partials.menu')
    </div>
    <div class="content">
        <div class="row justify-content-center">
            <table border="1px">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Cap Min</th>
                        <th>Cap Max</th>
                        <th>Fixação</th>
                        <th>Taxa</th>
                        <th>Vencimento</th>
                        @if(auth()->user()->name == 'admin')
                            <th></th>
                            <th></th>
                        @else
                            <th></th>
                         @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($investimentos as $investimento)
                        <tr>
                            <td>{{ $investimento->tipoInvestimento->tipo_investimento }}</td>
                            <td>{{ $investimento->capital_min }}</td>
                            <td>{{ $investimento->capital_max }}</td>
                            <td>{{ $investimento->pre_pos_fixado }}</td>
                            <td>{{ $investimento->taxa }}</td>
                            <td>{{ $investimento->vencimento }}</td>
                            @if(auth()->user()->name == 'admin')
                                <td>
                                    <a href="{{ route('investimento.edit', $investimento->id) }}">Editar</a>
                                </td>
                                <td>
                                    <form
                                        id="form_{{ $investimento->id }}"
                                        method="post"
                                        action="{{ route('investimento.destroy', ['investimento' => $investimento->id]) }}"
                                    >
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $investimento->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('carteira-investimento.show', $investimento->id) }}">Investir</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection