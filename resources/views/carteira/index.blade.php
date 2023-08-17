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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $carteira->user->name }}</td>
                            <td>{{ $carteira->qtd_investimentos }}</td>
                            <td>{{ $carteira->total_aplicado }}</td>
                            <td><a href="{{ route('investimento.index') }}">Ver Investimentos</a></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection