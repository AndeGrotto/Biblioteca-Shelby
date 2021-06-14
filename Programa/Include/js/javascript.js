$(document).ready(function(){
    $('.data').mask('00/00/0000');
    $('.hora').mask('00:00:00');
    $('.cep').mask('00000-000');
    $('.telefone').mask('(00) 00000-0000');
    $('.cpf').mask('000.000.000-00');
    $('.dinheiro').mask('000.000.000.000,00');
    $('.isbn').mask('000–00–000–0000–0');
});

function goBack() {
    window.history.back()
}
