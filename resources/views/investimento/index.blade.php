@extends('layouts.app')

@section('content')
    <div class="content">
        <a href="{{ route('investimento.index') }}">Lista de Investimentos</a>
        <a href="{{ route('investimento.create') }}">Novo Investimento</a>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection