<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>

    <!-- Estilos -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />

    <link rel="stylesheet" href="../Include/css/estilo.css">
    <style>
        * {
            font-size: 25px;
        }

        table,
        td,
        th {
            border: 1px solid black;
        }

        th {
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
        }

        a {
            text-decoration: none;
        }

        .tabelas {
            display: flex;
            margin: 5vw;
        }
        .livros {
            padding-right: 56vw;
        }
    </style>
</head>

<body>
    <title>Listagem dos Livros Cadastrados</title>
    <div class="tabelas">
        <div class="livros">
            <table>
                <h1>Livros</h1>
                <tr>
                    <th>ISBN</th>
                    <th>Nome</th>
                </tr>
                <?php
                include_once("../controller/EmprestimoController.php");
                $obj = new EmprestimoController();
                $obj->controlaConsultaLivros(1);
                ?>
            </table>
        </div>

        <div class="alunos">
            <table>
                <h1>Alunos</h1>
                <th>Nome</th>
                <th>Telefone</th>
                <?php
                include_once("../controller/EmprestimoController.php");
                $obj = new EmprestimoController();
                $obj->controlaConsultaAlunos(1);
                ?>
            </table>
        </div>
    </div>

    <a class="return" href="../index.php">
        <button type="button">Retornar para a página principal</button>
    </a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


    <script type="text/javascript" src="../Include/js/javascript.js"></script>

    <body>

</html>