<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hedvig+Letters+Sans&family=Lato:ital,wght@1,300&family=Montserrat:ital,wght@0,400;0,600;0,700;1,300&family=Rubik:wght@400;500&family=Ysabeau:wght@200&display=swap"
        rel="stylesheet">
    <title>Piteco ~ Login</title>
</head>

<body>
    <div class="carregar" id="carregar">
        <div id="loader">
            <div id="shadow"></div>
            <div id="box"></div>
        </div>
        <h4>Carregando...</h4>
    </div>
    <div class="conteudo animate__animated  animate__bounceInDown animate__slow" id="conteudo">

        <div class="sombra">
            <div class="login-box tela_login" id="tela_login">
                <h2>Piteco</h2>
                <form method="post" action="{{ route('login_action') }}">
                    @csrf
                    <div class="user-box">
                        <input type="email" name="email_login"
                            class="@error('email_login')
                            erro
                         @enderror"
                            value="{{ old('email_login') }}" required>
                        <label>E-mail</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password_login"
                            class="@error('password_login')
                            erro
                        @enderror"
                            required="">
                        <label>Senha</label>
                    </div>
                    <div class="div_buttons">
                        <button>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Entrar
                        </button>
                        <a href="#" class="bt_cadastro" id="login" onclick="analu()">CRIAR CONTA</a>
                    </div>
                </form>
            </div>
            <div class="login-box tela_cadastro" id="tela_cadastro">
                <h2>Piteco</h2>
                <form method="post" action="{{ route('cadastro_action') }}">
                    @csrf
                    <div class="user-box" id="tela_cadastroo">
                        <input type="text" name="name" class="@error('name') erro @enderror" required=""
                            value="{{ old('name') }}">
                        <label>Nome</label>
                    </div>
                    <div class="user-box">
                        <input type="email" name="email"
                            class="@error('email')
                            erro
                        @enderror"
                            required="" value="{{ old('email') }}">
                        <label>E-mail</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password"
                            class="@error('password')
                            erro
                        @enderror"
                            required="" value="{{ old('password') }}">
                        <label>Senha</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password_confirmation"
                            class="@error('password')
                            erro
                        @enderror"
                            required="" value="{{ old('password_confirmation') }}">
                        <label>Confirmar Senha</label>
                    </div>
                    <div class="div_buttons">
                        <button>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Cadastrar
                        </button>
                        <a href="#" disabled class="bt_cadastro" id="cadastro" onclick="formiga()">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/js.js') }}"></script>

</body>



</html>
