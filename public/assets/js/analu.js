var url = window.location.href;
url = url.split("/");
url = url[url.length - 1];
console.url
if (!url) {
    document.addEventListener("DOMContentLoaded", function () {
        var porcentagem = document.querySelector(".porcentagem");
        porcentagem.classList.add("mostrar");
    });
    document.getElementById("home").classList.add("check_icon");
    var ctx = document.getElementById("myChart").getContext("2d");
    var entrada = document.getElementById("entrada").value;
    var saida = document.getElementById("saida").value;
    if (entrada == 0 && saida == 0) {
        saida = 1;
        entrada = 1;
    }
    var myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            datasets: [
                {
                    data: [entrada, saida],
                    backgroundColor: [
                        "#2ecc71", // Verde para Saídas
                        "#ff4d4d", // Vermelho para Entradas
                    ],
                    borderWidth: 0, // Define a largura da borda para zero para tornar o gráfico mais fino
                },
            ],
        },
        options: {
            cutoutPercentage: 70, // Reduz a porcentagem de corte para tornar o buraco menor
            responsive: false,
            legend: {
                display: true,
                position: "bottom", // Coloca a legenda na parte inferior
            },
        },
    });
} else if (url == "perfil") {
    document.getElementById("perfil").classList.add("check_icon");
    document.getElementById("bt_add").style.display = "none";
} else if (url == "categoria") {
    document.getElementById("categoria").classList.add("check_icon");
    const checkbox = document.getElementById("fluxo");
    const saida = document.querySelector(".saida");
    const entrada = document.querySelector(".entrada");

    entrada.addEventListener("click", function () {
        checkbox.checked = true;
    });
    saida.addEventListener("click", function () {
        checkbox.checked = false;
    });
    var mensagemSucesso = document.getElementById("mensagem_sucesso");

    if (mensagemSucesso) {
        setTimeout(function () {
            mensagemSucesso.style.transition = "opacity 0.5s ease"; // Define a transição suave da opacidade
            mensagemSucesso.style.opacity = "0"; // Define a opacidade como 0 (totalmente transparente)
        }, 3000);
    }
} else if (url == "extrado") {
    document.getElementById("report").classList.add("check_icon");
    document.addEventListener("DOMContentLoaded", function () {
        var mensagemSucesso = document.getElementById("mensagem_sucesso");

        if (mensagemSucesso) {
            setTimeout(function () {
                mensagemSucesso.style.transition = "opacity 0.5s ease"; // Define a transição suave da opacidade
                mensagemSucesso.style.opacity = "0"; // Define a opacidade como 0 (totalmente transparente)
            }, 3000);
        }
    });
} else if(url == "relatorio"){
    document.getElementById('dashbord').classList.add('check_icon');
}

 //*Função para formatar o número como moeda
function formatarMoeda(valor) {
    return valor.toLocaleString("pt-BR", {
        style: "currency",
        currency: "BRL",
    });
}

// Função para remover formatação e obter apenas o valor numérico
function obterValorNumerico(valor) {
    return parseFloat(valor.replace(/\D/g, "")) || 0;
}

// Selecionando o input de valor
var inputValor = document.getElementById("valor");

// Adicionando um ouvinte de evento de entrada para formatar a moeda enquanto o usuário digita
inputValor.addEventListener("input", function () {
    // Obter o valor sem formatação
    var valorNumerico = obterValorNumerico(inputValor.value);
    // Formatar o valor como moeda e definir de volta no input
    inputValor.value = formatarMoeda(valorNumerico / 100); // Dividido por 100 para considerar duas casas decimais
});

var audio = document.getElementById("efeito_sonoro");
document.getElementById("fluxo").addEventListener("click", function () {
    audio.currentTime = 0; // Reinicia o áudio para o início
    audio.play();
});

var audio_tiro = document.getElementById("efeito_sonoro_tiro");
document
    .getElementById("adicionar_saida")
    .addEventListener("click", function () {
        audio_tiro.currentTime = 0; // Reinicia o áudio para o início
        audio_tiro.play();
    });

document
    .getElementById("adicionar_saida")
    .addEventListener("click", function (event) {
        // Prevenir o comportamento padrão do botão (envio do formulário)
        event.preventDefault();

        // Adicionar um atraso de 2 segundos antes de enviar o formulário
        setTimeout(function () {
            // Enviar o formulário
            document.querySelector("form").submit();
        }, 850); // 2000 milissegundos = 2 segundos
    });

document.addEventListener("DOMContentLoaded", function () {
    var mensagemSucesso = document.getElementById("mensagem_sucesso");

    if (mensagemSucesso) {
        setTimeout(function () {
            mensagemSucesso.style.transition = "opacity 0.5s ease"; // Define a transição suave da opacidade
            mensagemSucesso.style.opacity = "0"; // Define a opacidade como 0 (totalmente transparente)
        }, 3000);
    }
});
