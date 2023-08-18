@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <table border="1px">
                <thead>
                    <tr>
                        <th>Carteira ID</th>
                        <th>Tipo</th>
                        <th>Capital Investido</th>
                        <th>Prazo</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($investimentos as $investimento)
                        <tr>
                            <td>{{ $investimento->carteira_id }}</td>
                            <td>{{ $investimento->tipoInvestimento->tipo_investimento }}</td>
                            <td>{{ $investimento->capital_inicial }}</td>
                            <td>{{ $investimento->prazo }}</td>
                            <td><a href="{{ route('investimento.edit', $investimento->id) }}">Editar</a></td>
                            <td><a href="">Resgatar</a></td>
                            <td><a href="{{ route('calculadora.show', $investimento->id) }}">Calcular Rendimento</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection