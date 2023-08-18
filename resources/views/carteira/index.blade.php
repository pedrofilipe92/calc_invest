@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <table border="1px">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Qtd Investimentos</th>
                        <th>Total Aplicado</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $carteira->user->name }}</td>
                            <td>{{ $carteira->qtd_investimentos }}</td>
                            <td>{{ $carteira->total_aplicado ?? '' }}</td>
                            <td>{{ $carteira->saldo ?? '' }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="row justify-content-center">
            <table border="1px">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Fixação da taxa</th>
                        <th>Taxa</th>
                        <th>Vencimento</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carteira->investimentos as $investimento)
                        <tr>
                            <td>{{ $investimento->tipoInvestimento->tipo_investimento }}</td>
                            <td>{{ $investimento->pre_pos_fixado }}</td>
                            <td>{{ $investimento->taxa }}</td>
                            <td>{{ $investimento->vencimento }}</td>
                            <td><a href="{{ route('calculadora.calcular', $investimento) }}">Calcular rendimento</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
