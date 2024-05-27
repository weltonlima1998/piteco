<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap">
    <title>Piteco ~ Login</title>
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="POST" action="{{ route('login_action') }}">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Senha" required="">
                <button>Entrar</button>
            </form>
        </div>

        <div class="login" for="chk">
            <form method="POST" action="{{ route('cadastro_action') }}">
                @csrf
                <label for="chk" aria-hidden="true">Criar Conta</label>
                <input type="text" name="name" placeholder="Nome Completo" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Senha" required="">
                <button class="btn">Criar</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("chk").addEventListener("change", function() {
            if (this.checked) {
                document.body.style.backgroundColor = "#B4CDDC";
            } else {
                document.body.style.background = ""; // Restaura o fundo padrão
            }
        });
    </script>
</body>

</html>
