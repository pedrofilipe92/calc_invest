@if (auth()->user()->name != 'admin')
    <li>
        <a class="navbar-brand" href="{{ route('carteira.index') }}">Minha Carteira</a>
    </li>
@endif
<li>
    <a class="navbar-brand" href="{{ route('investimento.index') }}">Investimentos</a>
</li>
<li>
    <a class="navbar-brand" href="{{ route('calculadora.index') }}">Calculadora</a>
</li>
