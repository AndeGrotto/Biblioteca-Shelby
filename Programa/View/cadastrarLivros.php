<?php require '__header.phtml'; ?>
<?php require '__menu.phtml'; ?>

<div class="container">
        <?php
            include_once("../Include/livrosResult.php");
            include_once("../Controller/LivrosController.php");
            $obj = new LivrosController();
            $obj->controlaInsercao();
        ?>
    <div class="page-header">
        <h2>Adicionar livro</h2>
        <a class="btn btn-light" href="mostrarLivros.php">
            <i class="fa fa-times-circle" style="margin-right:8px"></i><span>Cancelar</span>
        </a>
    </div>
    
    <form method="POST" action="cadastrarLivros.php">
        <div class="mb-3">
            <label for="input-isbn" class="form-label">ISBN</label>
            <input type="text" maxlength="13" class="isbn form-control font" id="isbn" name="isbn" title="Digite o ISBN do livro" required>
        </div>

        <div class="mb-3">
            <label for="input-nome" class="form-label">Nome</label>
            <input type="text" maxlength="30" class="form-control font" id="nome" name="nome" title="Digite o nome do produto" required>
        </div>

        <div class="mb-3">
            <label for="input-autor" class="form-label">Autor</label>
            <input type="text" maxlength="30" class="form-control font" id="autor" name="autor" title="Digite o nome do autor" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar livro</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript" src="../Include/js/javascript.js"></script>

<?php require '__footer.phtml'; ?>