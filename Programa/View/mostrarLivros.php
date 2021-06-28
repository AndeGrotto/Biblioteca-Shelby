<?php require '__header.phtml'; ?>
<?php require '__menu.phtml'; ?>

            <div class="container-fluid">
                <div class="table-responsive-xl table-hover">
                    <div class="botao">
                        <button onclick="window.location.href='cadastrarLivros.php'" class="btn btn-primary">
                            <i class="fa fa-plus-square"></i> Adicionar
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ISBN</th>
                                <th>Nome</th>
                                <th>Autor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once("../Controller/LivrosController.php");
                                $obj = new LivrosController();
                                $obj->controlaConsulta(1);
                            ?>
                        </tbody>
                    </table>
                </div>   
            </div>
            
    <?php require '__footer.phtml'; ?>