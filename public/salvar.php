<?php

require_once "config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastrar.php");
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$categoria = trim($_POST["categoria"] ?? "");
$faixa_etaria = trim($_POST["faixa_etaria"] ?? "");
$preco = $_POST["preco"] ?? "";
$quantidade = $_POST["quantidade"] ?? "";

if (
    $nome === "" ||
    $categoria === "" ||
    $faixa_etaria === "" ||
    $preco === "" ||
    $quantidade === ""
) {
    die("Todos os campos são obrigatórios.");
}

if (!is_numeric($preco) || $preco < 0) {
    die("Preço inválido.");
}

if (!filter_var($quantidade, FILTER_VALIDATE_INT) && $quantidade != 0) {
    die("Quantidade inválida.");
}

if ($quantidade < 0) {
    die("A quantidade não pode ser negativa.");
}

try {

    $sql = "INSERT INTO brinquedos
            (nome, categoria, faixa_etaria, preco, quantidade)
            VALUES
            (:nome, :categoria, :faixa_etaria, :preco, :quantidade)";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":categoria", $categoria);
    $stmt->bindValue(":faixa_etaria", $faixa_etaria);
    $stmt->bindValue(":preco", $preco);
    $stmt->bindValue(":quantidade", $quantidade, PDO::PARAM_INT);

    $stmt->execute();

    header("Location: index.php");
    exit;

} catch (PDOException $erro) {

    die("Erro ao cadastrar o brinquedo: " . $erro->getMessage());

}