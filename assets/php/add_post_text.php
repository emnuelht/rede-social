<?php

include "conexao.php";

$nome_usuario = $_POST['usuario'];
$post_texto = $_POST['post_texto'];

$imagePath = $_POST["ftPerfil"];

mysqli_query($conn, "INSERT INTO geral (img_perfil,usuario,texto) VALUES ('$imagePath','$nome_usuario','$post_texto') ");

header('Location: ../../index.php');


?>