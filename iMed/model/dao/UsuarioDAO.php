<?php

include_once 'Conexao.php';

$uausarios = $connection->query("SELECT * FROM usuarios");
