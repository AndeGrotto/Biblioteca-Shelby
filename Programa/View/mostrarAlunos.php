<?php require '__header.phtml'; ?>
<?php require '__menu.phtml'; ?>

            <div class="container-fluid">
                <div class="table-responsive-xl table-hover">
                    <div class="botao">
                        <button onclick="window.location.href='cadastrarAlunos.php'" class="btn btn-primary">
                            <i class="fa fa-plus-square"></i> Adicionar
                        </button>
                    </div>
                    <table class="table">
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
            </div>
            
    <?php require '__footer.phtml'; ?>