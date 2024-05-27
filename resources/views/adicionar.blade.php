<x-layout>
    <div class="container">
        <h1 class="titulo">FLUXO</h1>
        <form action="{{ route('add_action') }}" method="POST">
            @csrf
            <div class="card">
                <div class="input">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" class="input_perfil" placeholder="R$ 10,00">
                </div>
                <div class="input">
                    <label for="categoria">SELECIONE UMA CATEGORIA</label>
                    <select name="categoria_id" id="categoria" data-size='2'>
                        <option value="" selected disabled>CATEGORIA</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="checkbox-wrapper input">
                    <input type="checkbox" class="check" id="check1-61" name="fixa">
                    <label for="check1-61" class="label">
                        <svg width="45" height="45" viewBox="0 0 95 95">
                            <rect x="30" y="20" width="50" height="50" stroke="black" fill="none"></rect>
                            <g transform="translate(0,-952.36222)">
                                <path
                                    d="m 56,963 c -102,122 6,9 7,9 17,-5 -66,69 -38,52 122,-77 -7,14 18,4 29,-11 45,-43 23,-4"
                                    stroke="black" stroke-width="3" fill="none" class="path1"></path>
                            </g>
                        </svg>
                        <span>Despesa Fixa</span>
                    </label>
                </div>
                <button class="bt_input" id="adicionar_saida">ADICIONAR</button>
            </div>
        </form>
        @if (session('mensagem'))
            <div class="mensagem_sucesso" id="mensagem_sucesso">
                <img src="{{ asset('/assets/img/icons/sucesso.png') }}" alt="">
                <p>Feito com sucesso!</p>
            </div>
        @endif

        <audio id="efeito_sonoro" src="{{ asset('assets/audio/gato.mp3') }}" type="audio/mpeg"></audio>
        <audio id="efeito_sonoro_tiro" src="{{ asset('assets/audio/tiro.mp3') }}" type="audio/mpeg"></audio>
    </div>
</x-layout>
