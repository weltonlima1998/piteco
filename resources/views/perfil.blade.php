<x-layout>
    <div class="container">
        <h1 class="titulo">MINHA CONTA</h1>
        <form action="{{ route('perfil_action') }}" method="post">
            @csrf
            <div class="card">
                <div class="input">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="" class="input_perfil" value="{{ $user->name }}">
                </div>
                <div class="input">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="" class="input_perfil"
                        value="{{ $user->email }}">
                </div>
                <div class="input">
                    <label for="password">Nova Senha</label>
                    <input type="password" name="password" id="" class="input_perfil">
                </div>
                <div class="input">
                    <label for="password">Confirmar senha</label>
                    <input type="password" name="password_confirmation" id="" class="input_perfil">
                </div>
                <button class="bt_input">SALVAR</button>
                <a href="{{ route('logout_action') }}" class="sair_perfil">Deseja sair?</a>
            </div>
        </form>
    </div>
</x-layout>
