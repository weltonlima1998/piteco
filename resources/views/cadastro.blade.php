<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hedvig+Letters+Sans&family=Montserrat:ital,wght@0,400;0,600;0,700;1,300&family=Rubik:wght@400;500&family=Ysabeau:wght@200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Piteco</title>
</head>

<body>
    <div class="container">
        <div class="div_img_logo">
            <img src="assets/img/logo_transparent.png" alt=""
                class="img_logo animate__animated animate__rubberBand animate__backInRight" id="img_cadastro">
        </div>
        <div class="formulario_login  animate__animated animate__rubberBand animate__backInLeft" id="div_cadastro">
            <form action="{{ route('cadastro_action') }}" method="post">
                @csrf
                <input type="text" name="name" id="formulario_erro" placeholder="Nome Completo"

                @enderror">
                <input type="email" name="email" id="formulario_erro" placeholder="Digite seu E-mail"
                    class="form_login @error('email')
                    erro
                @enderror">
                <input type="password" name="password" id="formulario_erro" placeholder="Digite Sua Senha"
                    class="form_login @error('password')
                    erro
                @enderror">
                <input type="password" name="password_confirmation" id="formulario_erro"
                    placeholder="Confirme sua senha"
                    class="form_login @error('password')
                    erro
                @enderror">
                <br>
                <button class="bt_login ">
                    Cadastrar
                </button>
            </form>
            <p>Já tem conta? <a href="{{ route('login') }}"id="cadastro" class="criar_conta">Entre</a></p>
        </div>
    </div>
    @push('scripts')
        <script src="assets/js/js.js"></script>
    @endpush
    @stack('scripts')
</body>

</html>
