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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $investimento->tipoInvestimento->tipo_investimento }}</td>
                        <td>{{ $investimento->capital_min }}</td>
                        <td>{{ $investimento->capital_max }}</td>
                        <td>{{ $investimento->pre_pos_fixado }}</td>
                        <td>{{ $investimento->taxa }}</td>
                        <td>{{ $investimento->vencimento }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row justify-content-center">
            <form action="{{ route('carteira-investimento.store') }}" method="post">
                @csrf
                <input name="investimento_id" type="text" value="{{ $investimento->id }}" hidden>
                <input name="capital_investido" type="text" placeholder="Valor">
                <button class="btn-primary" type="submit">Investir</button>
            </form>
        </div>
    </div>
@endsection
