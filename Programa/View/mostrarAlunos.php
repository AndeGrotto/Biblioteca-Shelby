<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>

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

<body>

    <header>

        <input type="checkbox" id="bt_menu">
        <label for="bt_menu">&#9776;</label>

        <nav class="menu">
                <ul>
 
                    <li><a href="login.php">Login</a></li>
                    <li><a href="telaPrincipal.html">Home</a></li>
                    <li><a href="#">Cadastrar</a>
                        <ul> 
                            <li><a href="cadastrarAlunos.php">Alunos</a></li>
                            <li><a href="cadastrarEmprestimo.php">Empréstimo</a></li>
                            <li><a href="cadastrarLivros.php">Livros</a></li>
                        </ul>
                        </li>

                    <li><a href="#">Tabelas</a>
                        <ul> 
                            <li><a href="mostrarAlunos.php">Alunos</a></li>
                            <li><a href="mostrarEmprestimo.php">Empréstimo</a></li>
                            <li><a href="mostrarLivros.php">Livros</a></li>
                        </ul>
                    </li>
                </ul>    
                <a href="telaPrincipal.html" class="log"><img class="logo" src="../Include/imagens/imagem6-logo.png"> </a>
        </nav>             
    </header>

    <main>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Matrícula</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include_once("../Controller/AlunosController.php");
                        $obj = new AlunosController();
                        $obj->controlaConsulta(1);
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script type="text/javascript" src="../Include/js/javascript.js"></script>

    <body>

</html>