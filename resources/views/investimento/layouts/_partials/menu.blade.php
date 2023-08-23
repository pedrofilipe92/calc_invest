<a class="navbar-brand" href="{{ route('investimento.index') }}">Lista de Investimentos</a>
@if(auth()->user()->name == 'admin')
    <a class="navbar-brand" href="{{ route('investimento.create') }}">Novo Investimento</a>
@endif
