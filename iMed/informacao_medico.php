<?php
include_once 'model/dao/UsuarioDAO.php';
include_once 'model/dao/MedicoDAO.php';

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Infogmação</title>
        <link href="view/css/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="view/css/informacao.css">
        <script src="view/css/bootstrap-4.1.3/js/bootstrap.min.js"></script>
        <script src="view/js/jquery-3.3.1.min.js"></script>
    </head>
    <body>

        <!-- cabeçalho -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-1 bg-white border-bottom shadow-sm">
            <a class="py-2 d-none d-md-inline-block ml-sm-3 mr-md-auto" href="profissionais.php"><img src="view/img/back.png" width="50" height="50"></a>
            <nav class="my-2 my-md-0 mr-md-3">
            </nav>

            <div class="container-fluid">
                <div class="box">
                    <div class="">
                        <div class="panel-heading">
                            <h3 class="titulo text-muted">Informações</h3>
                        </div>
                        <div class="inf">
                            <form role="form" action="" method="post">
                                <div>
                                    <div class="form-group">
                                        <img src="view/img/foto11.png" class="">
                                    </div>
                                    <div class="form-group">
                                        <label >Nome: </label>
                                        <label  nome="nome">Dra. Marta Lemos</label>
                                    </div>
                                    <div class="form-group">
                                        <label >Email: </label>
                                        <label  nome="email">marta@hotmail.com</label>
                                    </div>
                                    <div class="form-group">
                                        <label >Contato: </label>
                                        <label  nome="contato">(31)97834-0453</label>
                                    </div>
                                    <div class="form-group">
                                        <label >Endereço: </label>
                                        <label  nome="endereco">Av. Getúlio Vargas 4005 - João Monlevade</label>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="card text-center card-footer text-muted">Copyright © 2018 Carlos/Gilberto - Todos os direitos reservados </div>
    </body>
</html>