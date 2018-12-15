<?php
include_once 'model/bo/verifica_login.php';
include_once 'model/dao/MedicoDAO.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Principal</title>
        <link href="view/css/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="view/css/index.css">
        <script src="view/css/bootstrap-4.1.3/js/bootstrap.min.js"></script>
        <script src="view/js/jquery-3.3.1.min.js"></script>


    </head>
    <body>

        <!-- cabeçalho -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-1 bg-white border-bottom shadow-sm">
            <a class="py-2 d-none d-md-inline-block ml-sm-3 mr-md-auto" href="index.php"><img src="view/img/logo.png" width="100" height="53"></a>
            <nav class="my-2 my-md-0 mr-md-3">

                <?php
                if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
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

            <!--<a class="btn btn-outline-primary" href="#">Cadastro</a> -->
        </div>

        <!-- Banner -->
        <div class="jumbotron banner row">
            <div class="container col-md-4">
                <h1 class="display-3 ">iMed</h1>
                <p>Encontre o melhor profissional para o que precisa do conforto de sua casa.</p>
                <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Saiba mais &raquo;</a></p> -->
            </div>
            <img src="view/img/banner.png" class="">
        </div>


        <!-- Aréa de especialidades -->

        <div class="row prof">
            <div class="container rel col-10">
                <div class="container-fluid campos">
                    <h2 >Pesquisar profissionais</h2>
                    <form action="" method="post">

                        <div class="form-row fomulario">

                            <div class="form-group col-4">
                                <label for="esp">Selecione uma especialidade</label>
                                <select class="form-control" name="especialidade" required>
                                    <option>Todas</option>

                                    <?php
                                    while ($esp = $especialidade->fetch()) {
                                        echo "<option>" . $esp['Especialidade'] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>

                            <div class="form-group col">
                                <label for="cid">Selecione uma cidade</label>
                                <select class="form-control" name="cidade" required>
                                    <option></option>

                                    <?php
                                    while ($cid = $cidade->fetch()) {
                                        echo "<option>" . $cid['endereco'] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>

                        </div>

                        <div class="ml-auto mr-auto col-3 mt-4">
                            <button type="submit" class="btn btn-outline-primary col">Pesquisar</button>
                        </div>

                    </form>
                </div>
                <?php
                if (isset($_POST['cidade'])) {

                    $e2 = $_POST['especialidade'];
                    $c2 = $_POST['cidade'];

                    if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {

                        if ($e2 == 'Todas') {
                            echo '<div class = "alert alert-info" role = "alert">
                                        A busca encontrou ' . $profissionais->rowCount() . ' profissionais com a especialidade informada. Para visualizar efetue Login.
                                  </div>';
                        } else {
                            $n_prof = $connection->query("SELECT crm FROM medico WHERE Especialidade = '" . $_POST['especialidade'] . "' AND endereco = '" . $_POST['cidade'] . "'");

                            echo '<div class = "alert alert-info" role = "alert">
                                        A busca encontrou ' . $n_prof->rowCount() . ' profissionais com a especialidade informada. Para visualizar efetue Login.
                                 </div>';
                        }
                    } else {
                        header("Location: profissionais.php");
                    }
                }
                ?>
            </div>

        </div>


        <!-- Rodapé -->

        

        <div class="card text-center card-footer text-muted">Copyright © 2018 Carlos/Gilberto - Todos os direitos reservados </div>
        
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
