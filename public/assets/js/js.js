document.addEventListener('DOMContentLoaded', function () {
    var divPai = document.getElementById('tela_cadastro'); // Selecione a div pai

    if (divPai) {
        var algumFilhoTemErro = Array.from(divPai.getElementsByClassName('erro')).some(function (filho) {
            return filho.classList.contains('erro');
        });

        if (algumFilhoTemErro) {
            analu();
        } else {
            console.log('Nenhum campo possui a classe de erro.');
        }
    } else {
        console.log('A div pai não foi encontrada.');
    }
});

window.addEventListener("load", function () {


    setTimeout(function () {
        document.getElementById('carregar').style.display = "none";
        document.getElementById('conteudo').style.display = "block";
        document.getElementById('loader').classList.add('animate__animated', 'animate__backOutDown', 'animate__slow');
    }, 1000);
});
document.addEventListener('DOMContentLoaded', function () {
    var inputsComErro = document.querySelectorAll('.erro');

    inputsComErro.forEach(function (input) {
        input.addEventListener('click', function () {
            input.classList.remove('erro');
        });
    });
});
function analu() {
    var login = document.getElementById('tela_login');
    var cadastro = document.getElementById('tela_cadastro');

    login.classList.remove('tela_login');
    login.classList.add('tela_cadastro');

    cadastro.classList.remove('tela_cadastro')
    cadastro.classList.add('tela_login');


} function formiga() {
    var login = document.getElementById('tela_login');
    var cadastro = document.getElementById('tela_cadastro');

    cadastro.classList.remove('tela_login');
    cadastro.classList.add('tela_cadastro');

    login.classList.remove('tela_cadastro')
    login.classList.add('tela_login');
}


