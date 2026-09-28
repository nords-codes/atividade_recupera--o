<?php

require_once "../infra/conecao.php";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "DELETE FROM brinquedos WHERE id = ?";

    $stmt = $conecao->prepare($sql);

    $stmt->bind_param("i", $id);

    $stmt->execute();

    header("Location: ../index.php");
    exit;

} else {

    echo "ID do brinquedo não informado.";

}