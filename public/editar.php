<?php

require_once "../infra/conecao.php";

if (!isset($_GET["id"])) {
    die("ID do brinquedo não informado.");
}

$id = $_GET["id"];

$sql = "SELECT * FROM brinquedos WHERE id = ?";

$stmt = $conecao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$brinquedo = $resultado->fetch_assoc();

if (!$brinquedo) {
    die("Brinquedo não encontrado.");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Brinquedo</title>

    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <h1>Editar Brinquedo</h1>

    <form action="atualizar.php" method="POST">

        <input type="hidden" name="id" value="<?= $brinquedo['id'] ?>">

        <label>
            Nome:
            <input
                type="text"
                name="nome"
                value="<?= htmlspecialchars($brinquedo['nome']) ?>"
                required
            >
        </label>

        <label>
            Categoria:
            <input
                type="text"
                name="categoria"
                value="<?= htmlspecialchars($brinquedo['categoria']) ?>"
                required
            >
        </label>

        <label>
            Faixa etária:
            <input
                type="text"
                name="faixa_etaria"
                value="<?= htmlspecialchars($brinquedo['faixa_etaria']) ?>"
                required
            >
        </label>

        <label>
            Preço:
            <input
                type="number"
                name="preco"
                step="0.01"
                value="<?= $brinquedo['preco'] ?>"
                required
            >
        </label>

        <label>
            Quantidade em estoque:
            <input
                type="number"
                name="quantidade"
                value="<?= $brinquedo['quantidade'] ?>"
                required
            >
        </label>

        <button type="submit">
            Salvar alterações
        </button>

    </form>

    <a href="../index.php" class="voltar">
        Voltar
    </a>

</body>

</html>