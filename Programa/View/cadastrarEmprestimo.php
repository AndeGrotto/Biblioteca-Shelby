<?php require '__header.phtml'; ?>
<?php require '__menu.phtml'; ?>
    <style>

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
            padding: 2ch 2vw;
        }
        
        .alunos{
            padding: 2ch 2vw;
            display: block;
        }
        .emprestimo{
            padding: 2ch 2vw;
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
                    <th></th>
                    <th>Nome</th>
                    <th>Autor</th>
                </tr>
                <?php
                include_once("../Controller/EmprestimoController.php");
                $obj = new EmprestimoController();
                $obj->controlaConsultaLivros(1);
                ?>
            </table>
        </div>
        <div class="alunos">
            <table>
                <h1>Alunos</h1>
                <th></th>
                <th>Alunos</th>
                <th>Telefone</th>
                <?php
                include_once("../controller/EmprestimoController.php");
                $obj = new EmprestimoController();
                $obj->controlaConsultaAlunos(1);
                ?>
            </table>
        </div>
        <div class="emprestimo">
            <form method="POST" action="cadastrarEmprestimo.php">
                <div class="form-group">
                 
                    <input type="text" class="form-control font" id="codEmprestimo" name="codEmprestimo" title="Informe o id" placeholder="Id emprestimo" required>
                
                </div>

                <div class="form-group">
                    <p>Data de emprestimo</p>
                    <input type="date"id="dataEmprestimo" name="dataEmprestimo" title="Informe data de emprestimo" placeholder="Emprestimo" required>
                </div>

                <div class="form-group">
                    <p>Data de devolução</p>
                    <input type="date"  id="dataDevolucao" name="dataDevolucao" title="Informe data de devolução" placeholder="Devolução" required>
                </div>

                <div class="form-group grid">
                    <input class="form-control emprestimo" type="submit" name="cadastrarEmprestimo" value="Adicionar">
                    <input class="form-control emprestimo" type="button" name="voltarEmprestimo" value="Voltar" onclick="goBack()">
                </div>
            </form>
                <?php
         
                    include_once("../Controller/EmprestimoController.php");
                    $obj = new EmprestimoController();
                    $obj->controlaInsercaoEmprestimo(1);
                ?>
        </div>

    </div>

    <a class="return" href="../index.php">
        <button type="button">Retornar para a página principal</button>
    </a>

    <?php require '__footer.phtml'; ?>