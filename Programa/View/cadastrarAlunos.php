<?php require '__header.phtml'; ?>
<?php require '__menu.phtml'; ?>

<div class="container">
    <?php
        include_once("../Include/alunosResult.php");
        include_once("../Controller/AlunosController.php");
        $obj = new AlunosController();
        $obj->controlaInsercao();
    ?>
    <div class="page-header">
        <h2>Adicionar aluno</h2>
        <a class="btn btn-light" href="mostrarAlunos.php">
            <i class="fa fa-times-circle" style="margin-right:8px"></i><span>Cancelar</span>
        </a>
    </div>

    <form method="POST" action="cadastrarAlunos.php">
        <div class="mb-3">
            <label for="input-nome" class="form-label">Nome</label>
            <input type="text" maxlength="30" class="form-control font" id="nome "name="nome" title="Informe seu nome" required>
        </div>

        <div class="mb-3">
            <label for="input-matricula" class="form-label">Matrícula</label>
            <input type="text" maxlength="20" class="matricula form-control font" id="matricula" name="matricula" title="Informe a matrícula" required>
        </div>

        <div class="mb-3">
            <label for="input-telefone" class="form-label">Telefone</label>
            <input type="text" class="telefone form-control font" id="Telefone" name="telefone" title="Informe o telefone" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar aluno</button>
    </form>
</div>

    <!-- Scripts -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

  <script type="text/javascript" src="../Include/js/javascript.js"></script>

  <?php require '__footer.phtml'; ?>