<?php
include "conexao.php";

$dt = $_POST['dt'];

mysqli_query($conn, "UPDATE geral SET dt='$dt' WHERE dt='0'");
?>
