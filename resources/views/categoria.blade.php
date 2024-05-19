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
                <div class="input">
                    <label for="email">Descrição</label>
                    <textarea name="descricao" id="" cols="30" rows="10" class="categoria_descricao"
                        placeholder="Descrição não é Obrigatória"></textarea>
                </div>
                <p class="categoria_p">
                </p>
                <button class="bt_input">CRIAR</button>
                <a href="{{ route('gerenciar_categoria') }}" class="categorias_gerenciar">Gerencias minhas Categorias</a>
            </div>
        </form>
    </div>
</x-layout>
