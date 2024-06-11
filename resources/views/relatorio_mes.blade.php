<x-layout>
    <div class="container">
        <h1>Top Gasto</h1>
        <div class="card">
            <ul class="extrado">
                @foreach ($saidas as $saida)
                    <li>
                        <p class="data">
                            {{ $saida->total_itens }}
                        </p>
                        <p class="categoria">
                            {{ $saida->categoria->name }}
                        </p>
                        <p class="valor">
                            R$: {{ $saida->valor_total }}
                        </p>
                        <a href="#">
                            <img src="{{ asset('/assets/img/icons/lupa.png') }}" alt="">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <h1>Top Ganho</h1>
        <div class="card">
            <ul class="extrado">
                @foreach ($entradas as $entrada)
                    <li>
                        <p class="data entrada">
                            {{ $entrada->total_itens }}
                        </p>
                        <p class="categoria">
                            {{ $entrada->categoria->name }}
                        </p>
                        <p class="valor">
                            R$: {{ $entrada->valor_total }}
                        </p>
                        <a href="#">
                            <img src="{{ asset('/assets/img/icons/lupa.png') }}" alt="">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>
