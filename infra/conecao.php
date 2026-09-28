<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "brinquedos";

$conecao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conecao->connect_error) {
    die("Falha na conexão: " . $conecao->connect_error);
};