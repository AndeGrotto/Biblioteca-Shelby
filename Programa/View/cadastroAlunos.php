<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-size: 25px;
        }

    </style>
</head>
<body>
    <form method="POST" action="cadastroAlunos.php">
        <input type="text" name="nome" placeholder="Digite seu nome"><br><br>
        <input type="text" name="telefone" id="telefone" placeholder="Digite seu telefone">
        <input type="submit" name="botao">
    </form>
    <?php
        include_once("../Controller/BibliotecaController.php");
        $obj = new BibliotecaController();
        $obj->controlaInsercao();
    ?>
</body>
</html>