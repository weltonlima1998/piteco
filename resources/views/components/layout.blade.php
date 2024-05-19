<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/css.css') }}">
    <script src="https://kit.fontawesome.com/43efe482a4.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200&family=Silkscreen&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Financeiro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>
    <div class="conteudo">
        {{ $slot }}
    </div>
    <div class="bt_add animate animate animate__bounce" id="bt_add">
        <a href="{{ route('add') }}" class="bt_add_content">+</a>
    </div>
    <footer>
        <a href="" class="a_icon_menu" id="dashbord">
            <img src="{{ asset('assets/img/icons/dashbord_icon.png') }}" alt="" class="img_icon_menu ">
        </a>
        <a href="{{ route('categoria') }}" class="a_icon_menu" id="categoria">
            <img src="{{ asset('/assets/img/icons/categoria_icon.png') }}" alt="" class="img_icon_menu">
        </a>
        <a href="{{ route('home') }}" class="a_icon_menu" id="home">
            <img src="{{ asset('/assets/img/icons/home_icon.png') }}" alt="" class="img_icon_menu">
        </a>
        <a href="{{ route('extrado') }}" class="a_icon_menu" id="report">
            <img src="{{ asset('/assets/img/icons/extrado_icon.png') }}" alt="" class="img_icon_menu">
        </a>
        <a href="{{ route('perfil') }}" class="a_icon_menu" id="perfil">
            <img src="{{ asset('/assets/img/icons/usuario_icon.png') }}" alt="" class="img_icon_menu">
        </a>
    </footer>
</body>
<script src="assets/js/analu.js"></script>

</html>
