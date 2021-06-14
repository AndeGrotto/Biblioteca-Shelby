<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro de Alunos</title>

<!-- Estilos -->

<link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <link 
    rel="stylesheet" 
    href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" 
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" 
    crossorigin="anonymous"
    />

    <link rel="stylesheet" href="../Include/css/estilo.css">

</head>
<body class="fotocadastroAlunos">
    <main>
        <div class="_containerCadastroAlunos">
            <img class="imglogin" src="../Include/imagens/avatarLogin.png"> 
            <!--<h3>Login Estoque</h3>-->    
            <form method="POST" action="cadastroAlunos.php">
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control font" id="nome "name="nome" title="Informe seu nome" placeholder="Nome" required>
                
                </div>
                <div class="form-group">
                    <i class="fas fa-phone"></i>
                    <input type="text" class="telefone form-control font" id="Telefone" name="telefone" title="Informe o telefone" placeholder="Telefone" required>
                </div>

                <div class="form-group grid">
                    <input class="form-control cadastro" type="submit" name="cadastrarAluno" value="Cadastrar">
                    <input class="form-control cadastro" type="submit" name="voltarAluno" value="Voltar" onclick="goBack()">
                </div>
            </form>
            <?php
                include_once("../Controller/AlunosController.php");
                $obj = new AlunosController();
                $obj->controlaInsercao();
            ?>
        </div>
    </main>
    
    <!-- Scripts -->

    <script
    src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"
  ></script>

  <script 
  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
  ></script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"
  ></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


  <script type="text/javascript" src="../Include/js/javascript.js"></script>
</body>
</html>

