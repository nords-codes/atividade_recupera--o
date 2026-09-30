<?php

require_once "../infra/conecao.php";

$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$faixa_etaria = $_POST["faixa_etaria"];
$preco = $_POST["preco"];
$quantidade = $_POST["quantidade"];

 $sql = "INSERT INTO brinquedos
            (nome, categoria, faixa_etaria, preco, quantidade)
            VALUES (?, ?, ?, ?, ?)";

if(!$stmt){
    die("Erro na preparação da consulta: " . $conecao->error);
    } 

   
    $stmt->bind_param(
        "sssdi",
        $nome,
        $categoria,
        $faixa_etaria,
        $preco,
        $quantidade
    );

    $stmt->execute();

    header("Location: ../index.php");
    exit;

 if(!$stmt->execute()) {

    die("Erro ao cadastrar o brinquedo: " . $erro->getMessage());

}