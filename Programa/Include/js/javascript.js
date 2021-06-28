$(document).ready(function(){
    $('.data').mask('00/00/0000');
    $('.hora').mask('00:00:00');
    $('.cep').mask('00000-000');
    $('.telefone').mask('(00) 00000-0000');
    $('.cpf').mask('000.000.000-00');
    $('.dinheiro').mask('000.000.000.000,00');
    $('.isbn').mask('#');
    $('.matricula').mask('#');
});

function goBack() {
    window.history.back()
}

function ConfirmarDelete()
{
  var x = confirm("Deseja realmente excluir?");
  if (x)
      return true;
  else
    return false;
}

function load() {
    console.log("Evento de carregamento detectado!");
  }