<?php
include_once 'model/bo/verifica_login.php';
include_once 'model/dao/MedicoDAO.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Profissionais</title>
        <link href="view/css/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="view/css/profissionais.css">
        <script src="view/css/bootstrap-4.1.3/js/bootstrap.min.js"></script>
        <script src="view/js/jquery-3.3.1.min.js"></script>
        

    </head>
    <body>
        <div>
            <!-- cabeçalho -->
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-1 bg-white border-bottom shadow-sm">
                <a class="py-2 d-none d-md-inline-block ml-sm-3 mr-md-auto" href="index.php"><img src="view/img/logo.png" width="100" height="53"></a>
                <nav class="my-2 my-md-0 mr-md-3">

                    <?php
                    if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
                        header("Location: login.php");
                        echo '<a class = "p-2 text-muted ml-sm-2" href = "index.php">Principal</a>
                    <a class = "p-2 text-muted ml-sm-2" href = "cadastro.php">Cadastrar</a>
                    <a class = "p-2 text-muted ml-sm-2" href = "login.php">Login</a>';
                    } else {
                        echo '<a class = "p-2 text-muted ml-sm-2" href = "index.php">Principal</a>
                            <a class = "p-2 text-muted ml-sm-2" href = "profissionais.php">Profissionais</a>
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class = "p-2 text-muted ml-sm-2 dropdown-toggle" href = "#">Bem Vindo ' . $_SESSION['nome'] . '</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="atualizar_cadastro.php">Atualizar Cadastro</a>
                            </div>
                            <a class = "p-2 text-muted ml-sm-2" href = "model/bo/sair.php">Sair</a>';
                    }
                    ?>
                </nav>
            </div>


            <div class="form-group mt-4">
                <form class="form-inline pt-4" action="" method="post">
                    <input class="form-control col-6 mr-2 ml-md-auto" type="text" placeholder="Pesquisar especialidade" aria-label="Search" name="buscar">
                    <button class="btn btn-outline-primary mr-md-auto" type="submit">Pesquisar</button>
                </form>
            </div>

            <div class="my-3 p-3 bg-white rounded shadow-sm">

                <h6 class="border-bottom border-gray pb-2 mb-2">Profissionais</h6>


                <?php
                while ($p = $profissionais->fetch()) {
                    echo '<div class="">
                            <div class="media text-muted pt-1">
                                <img src="' . $p['foto'] . '" alt="" class="mr-2 mt-4" width=100" height="100">
                                <p class="media-body pb-3 mb-0 mt-4 small lh-125 border-gray ml-3">
                                    <strong class="d-block text-gray-dark h4">' . $p['nome'] . '</strong>
                                    <strong class="d-block text-gray-dark mb-4">' . $p['Especialidade'] . ' - CRM ' . $p['crm'] .' - '.$p['endereco'] .'</strong>
                                    <span>' . $p['endereco'] . '</span>
                                       
                                    ' . $p['descricao'] . '
                                        
                                        <small class="d-block text-right mt-3">
                                            <button class="btn btn-outline-secondary" onclick="windows.location("informacao_medico.php")" type="button"><a href="informacao_medico.php" class="link">Contatar Profissional</a></button>
                                        </small>
                                </p>
                            </div>
                            
                        </div>
                        
                      
                    ';
                }
                ?>

            </div>
        </div>
        <div class="card text-center card-footer text-muted">Copyright © 2018 Carlos/Gilberto - Todos os direitos reservados </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>
</html>
