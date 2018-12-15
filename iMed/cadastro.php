<?php
include_once 'model/dao/UsuarioDAO.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Usuário</title>
        <link href="view/css/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="view/css/login.css">
        <script src="view/css/bootstrap-4.1.3/js/bootstrap.min.js"></script>
        <script src="view/js/jquery-3.3.1.min.js"></script>
    </head>
    <body>

        <!-- cabeçalho -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-1 bg-white border-bottom shadow-sm">
            <a class="py-2 d-none d-md-inline-block ml-sm-3 mr-md-auto" href="index.php"><img src="view/img/back.png" width="50" height="50"></a>
            <nav class="my-2 my-md-0 mr-md-3">
            </nav>

            <div class="container-fluid">
                <div class="col-5 ml-auto mr-auto box">
                    <div class="">
                        <div class="panel-heading">
                            <h3 class="titulo text-muted">Insira suas informações</h3>
                        </div>
                        <div class="campos">
                            <form role="form" action="" method="post">
                                <div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nome completo" name="nome" type="text" autofocus="" required="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Senha" name="senha" type="password" value="" required="">
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary logar">Fazer Cadastro</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['email'])) {
                        $n = $_POST['nome'];
                        $e = $_POST['email'];
                        $s = $_POST['senha'];

                        $insere = $connection->prepare("INSERT INTO usuario (nome, senha, email) VALUES (:nome, :senha, :email)");
                        $insere->bindValue(":nome", $n);
                        $insere->bindValue(":senha", $s);
                        $insere->bindValue(":email", $e);
                        $insere->execute();

                        if ($insere) {
                            echo '<div class = "alert alert-success mt-4" role = "alert">
                                Sucesso! Aguarde enquando você é redirecionado...
                          </div>';

                            header("Refresh: 1; url=login.php");
                        } else {
                            echo '<div class = "alert alert-warning mt-4" role = "alert">
                                Ocorreu um erro.
                          </div>';
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
        <div class="card text-center card-footer text-muted">Copyright © 2018 Carlos/Gilberto - Todos os direitos reservados </div>
    </body>
</html>
