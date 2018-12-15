<?php

include_once 'Conexao.php';

$profissionais = $connection->query("SELECT * FROM medico");

if (isset($_POST['buscar'])) {
    $profissionais = $connection->query("SELECT * FROM medico where Especialidade LIKE '%" . $_POST['buscar'] . "%'");

}

$especialidade = $connection->query("SELECT distinct Especialidade FROM medico ");
$cidade = $connection->query("SELECT distinct endereco FROM medico ");



