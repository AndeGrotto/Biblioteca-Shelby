<?php require '__header.phtml'; ?>
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
<?php require '__menu.phtml'; ?>


<div class="container">
    <?php
         include_once("../Controller/EmprestimoController.php");
         $obj = new EmprestimoController();
         $obj->controlaInsercao(1);
     ?>
    <div class="page-header">
        <h2>Adicionar livro</h2>
        <a class="btn btn-light" href="mostrarEmprestimo.php">
            <i class="fa fa-times-circle" style="margin-right:8px"></i><span>Cancelar</span>
        </a>
    </div>
    
    <form method="POST" action="cadastrarEmprestimo.php">

        <div class="mb-3">
            <table>
                <h1>Livros</h1>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>ISBN</th>
                        <th>Nome</th>
                        <th>Autor</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

                <?php
                include_once("../Controller/LivrosController.php");
                $obj = new LivrosController();
                $obj->controlaConsulta(2);
                ?>
            </table>
        </div>

        <div class="mb-3">
            <table>
                <h1>Alunos</h1>
            <thead>
                <tr>
                <th>Select</th>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Telefone</th>
                </tr>
            </thead>
            <tbody>

            </tbody>

                <?php
                include_once("../controller/AlunosController.php");
                $obj = new AlunosController();
                $obj->controlaConsulta(2);
                ?>
            </table>
        </div>

        <div class="mb-3">
            <label for="input-isbn" class="form-label">Data de empréstimo</label>
            <input type="date" class="form-control font" id="dataEmprestimo" name="dataEmprestimo" title="Digite a data de empréstimo" required>
        </div>

        <div class="mb-3">
            <label for="input-nome" class="form-label">Data de devolução</label>
            <input type="date" class="form-control font" id="dataDevolucao" name="dataDevolucao" title="Digite a data de devolução" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar livro</button>
    </form>
    <?php
                include_once("../controller/EmprestimoController.php");
                $obj = new EmprestimoController();
                $obj->controlaInsercao();
    ?>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript" src="../Include/js/javascript.js"></script>

<?php require '__footer.phtml'; ?>