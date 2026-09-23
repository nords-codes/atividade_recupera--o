<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Brinquedo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Cadastrar Brinquedo</h1>

    <form action="salvar.php" method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Categoria:</label>
        <input type="text" name="categoria" required>

        <label>Faixa etária:</label>
        <input type="text" name="faixa_etaria" placeholder="Ex: 5 a 8 anos" required>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" min="0" required>

        <label>Quantidade em estoque:</label>
        <input type="number" name="quantidade" min="0" required>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <a href="index.php">Voltar</a>

</body>
</html>