<x-layout>
    <div class="container">
        <h1 class="titulo">CATEGORIA</h1>
        <form action="{{ route('categoria_action') }}" method="post">
            @csrf
            <div class="card">
                <div class="input">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="" class="input_perfil"
                        placeholder="Nome da Categoria">
                </div>
                <div class="input checkbox">
                    <p class="saida">Saida</p>
                    <input type="checkbox" name="fluxo" id="fluxo" class="fluxo">
                    <p class="entrada">Entrada</p>
                </div>
                <button class="bt_input">CRIAR</button>
                <a href="{{ route('gerenciar_categoria') }}" class="categorias_gerenciar">Gerencias minhas
                    Categorias</a>
            </div>
        </form>
        @if (session('mensagem'))
        <div class="mensagem_sucesso" id="mensagem_sucesso">
            <img src="{{asset('/assets/img/icons/sucesso.png')}}" alt="">
            <p>Feito com sucesso!</p>
        </div>
    @endif
    </div>

</x-layout>
