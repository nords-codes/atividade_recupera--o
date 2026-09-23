<?php

require_once "config/conexao.php";

try {

    $sql = "SELECT * FROM brinquedos ORDER BY id DESC";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    $brinquedos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $erro) {

    $mensagem = "Erro ao buscar os brinquedos: " . $erro->getMessage();

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Gestão de Brinquedos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Gestão de Brinquedos</h1>

    <a href="cadastrar.php" class="botao">
        Cadastrar brinquedo
    </a>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Faixa etária</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($brinquedos as $brinquedo): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($brinquedo['id']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($brinquedo['nome']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($brinquedo['categoria']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($brinquedo['faixa_etaria']) ?>
                    </td>

                    <td>
                        R$ <?= number_format($brinquedo['preco'], 2, ',', '.') ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($brinquedo['quantidade']) ?>
                    </td>

                    <td>

                        <a href="editar.php?id=<?= $brinquedo['id'] ?>">
                            Editar
                        </a>

                        <a href="excluir.php?id=<?= $brinquedo['id'] ?>"
                           onclick="return confirm('Deseja realmente excluir este brinquedo?')">
                            Excluir
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</body>
</html>