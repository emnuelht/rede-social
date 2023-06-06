<?php
include "conexao.php";

$sql = mysqli_query($conn, "SELECT * FROM geral");

$dados = array();

while ($row = mysqli_fetch_assoc($sql)) {
    $dados[] = $row;
}

echo json_encode($dados);

?>
