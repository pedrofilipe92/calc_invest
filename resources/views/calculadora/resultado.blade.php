@extends('layouts.app')

@section('content')
    <div class="content">
        <h4 class="row justify-content-center">Resultado</h4>
        <div class="row justify-content-center">
            <table border="1px">
                <thead>
                    <tr>
                        <th>Mês</th>
                        <th>Rendimento</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < $retorno['vencimento']; $i++)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $retorno['rendimentos_mensais'][$i] }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection