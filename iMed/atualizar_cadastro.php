<?php
include_once 'model/dao/UsuarioDAO.php';
include_once 'model/bo/verifica_login.php';
include_once 'model/dao/Conexao.php';

if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Atualizar Cadastro</title>
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
                            <h3 class="titulo text-muted">Atualize suas informações</h3>
                        </div>
                        <div class="campos">
                            <form role="form" action="" method="post">
                                <div>
                                    <?php
                                    $tupla = $connection->query("SELECT * FROM usuario WHERE email ='" . $_SESSION['email'] . "'");

                                    while ($dados = $tupla->fetch()) {
                                        echo ' 
                                                <div class="form-group">
                                                    <input class="form-control" name="nome" type="text" value="' . $dados['nome'] . '" required autofocus>
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="text"  name="email" value="' . $dados['email'] . '" required autofocus>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Nova Senha" name="senha" type="password" value="" required autofocus>
                                                </div>';
                                    }
                                    ?>

                                    <button type="submit" class="btn btn-outline-primary logar">Atualizar Cadastro</button>

                                </div>
                            </form>

                            <?php
                            if (isset($_POST['email'])) {
                                $n = $_POST['nome'];
                                $e = $_POST['email'];
                                $s = $_POST['senha'];

                                $tupla = $connection->query("SELECT * FROM usuario WHERE email ='" . $_SESSION['email'] . "'");

                                while ($dados = $tupla->fetch()) {

                                    $atualiza = $connection->prepare("UPDATE usuario SET nome = :nome, senha = :senha, email = :email where idusuario = " . $dados['idusuario']);
                                    $atualiza->bindValue(":nome", $n);
                                    $atualiza->bindValue(":senha", $s);
                                    $atualiza->bindValue(":email", $e);
                                    $atualiza->execute();

                                    if ($atualiza) {
                                        echo '<div class = "alert alert-success mt-4" role = "alert">
                                                    Sucesso! Aguarde enquando você é redirecionado...
                                              </div>';

                                        header("Refresh: 1; url=index.php");
                                    } else {
                                        echo '<div class = "alert alert-warning mt-4" role = "alert">
                                                    Ocorreu um erro.
                                              </div>';
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <!--codigo php removido-->


                </div>

            </div>
        </div>





        <div class="card text-center card-footer text-muted">Copyright © 2018 Carlos/Gilberto - Todos os direitos reservados </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
