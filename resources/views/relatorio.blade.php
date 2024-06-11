<x-layout>
    <div class="container">
        <h1>Top Gasto/MÊS</h1>
        <div class="card">
            <ul class="extrado">
                @foreach ($saidas as $saida)
                    <li>
                        <p class="data entrada">
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

        <h1>MESES</h1>
        <div class="card">
            <ul class="relatorio">
                @foreach ($meses as $mes)
                    <li class="relatorio">
                        <a href="{{ route('relatorio.show', ['mes' => $mes['original']]) }}" class="relatorio">
                            {{ $mes['formatado'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>
