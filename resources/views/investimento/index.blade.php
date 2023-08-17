@extends('layouts.app')

@section('content')
    <table border="1px">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Capital Investido</th>
                <th>Prazo</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($investimentos as $investimento)
                <tr>
                    <td>{{ $investimento->tipoInvestimento->tipo_investimento }}</td>
                    <td>{{ $investimento->capital_inicial }}</td>
                    <td>{{ $investimento->prazo }}</td>
                    <td><a href="{{ route('investimento.edit', $investimento->id) }}">Editar</a></td>
                    <td><a href="">Resgatar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection