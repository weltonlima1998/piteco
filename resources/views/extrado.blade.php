<x-layout>
    <div class="container">
        <h1>{{ $mes }}</h1>
        @if (session('mensagem'))
            <div class="mensagem_sucesso" id="mensagem_sucesso">
                <img src="{{asset('/assets/img/icons/sucesso.png')}}" alt="">
                <p>Excluido com sucesso!</p>
            </div>
        @endif
        <div class="card">
            <ul class="extrado">
                @foreach ($registros as $registro)
                    <li>
                        <p class="data @if ($registro->tipo == 'entrada') entrada @endif">
                            {{ $registro->dia }}
                        </p>
                        <p class="categoria">{{ $registro->categoria->name }}</p>
                        <p class="valor">R$ {{ $registro->valor }}</p>
                        <a href="{{ route('excluir_extrado', ['tipo' => $registro->tipo, 'id' => $registro->id]) }}">
                            <img src="{{ asset('/assets/img/icons/excluir.png') }}" alt="">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</x-layout>
