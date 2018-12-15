<?php
include_once 'model/dao/UsuarioDAO.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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
                            <h3 class="titulo text-muted">Entre com os dados da sua conta</h3>
                        </div>
                        <div class="campos">
                            <form role="form" action="" method="post">
                                <div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Senha" name="senha" type="password" value="" required="">
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary logar">Entrar</button>

                                    <div class="link">           
                                        <!-- <button type="submit" class="btn btn-outline-primary voltar">Voltar</button> -->
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    session_start();

                    if (isset($_POST['email'])) {
                        $e = $_POST['email'];
                        $s = $_POST['senha'];

                        $usuario = $connection->query("SELECT * FROM usuario where email = '" . $e . "' AND senha = '" . $s . "'");

                        if ($usuario->rowCount() != 0) {

                            while ($user = $usuario->fetch()) {
                                $_SESSION['email'] = $user['email'];
                                $_SESSION['senha'] = $user['senha'];
                                $_SESSION['nome'] = $user['nome'];
                            }



                            echo '<div class = "alert alert-success" role = "alert">
                                Sucesso! Aguarde enquando você é redirecionado...
                          </div>';
                            header("Refresh: 1; url=index.php");
                        } else {
                            echo '<div class = "alert alert-warning" role = "alert">
                                Email ou senha incorreta. Tente novemente.
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
