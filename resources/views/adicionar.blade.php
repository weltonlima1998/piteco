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
                    <label for="categoria">CATEGORIA</label>
                    <select name="categoria_id" id="categoria" data-size='2'>
                        <option value="" selected disabled>CATEGORIA</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input checkbox">
                    <p class="saida">Saida</p>
                    <input type="checkbox" name="fluxo" id="fluxo" class="fluxo">
                    <p class="entrada">Entrada</p>
                </div>
                <p class="categoria_p">
                </p>
                <button class="bt_input" id="adicionar_saida">ADICIONAR</button>
            </div>
        </form>
        @if (session('mensagem'))
            <div class="mensagem_sucesso" id="mensagem_sucesso">
                <img src="{{asset('/assets/img/icons/sucesso.png')}}" alt="">
                <p>Feito com sucesso!</p>
            </div>
        @endif

        <audio id="efeito_sonoro" src="{{ asset('assets/audio/gato.mp3') }}" type="audio/mpeg"></audio>
        <audio id="efeito_sonoro_tiro" src="{{ asset('assets/audio/tiro.mp3') }}" type="audio/mpeg"></audio>
    </div>
</x-layout>
