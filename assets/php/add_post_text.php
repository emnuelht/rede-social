<?php

include "conexao.php";

$nome_usuario = $_GET['usuario'];
$post_texto = $_GET['post_texto'];

$ftPerfil = $_GET["ftPerfil"];

$imagePath = "assets/img_perfil/" . $ftPerfil;

mysqli_query($conn, "INSERT INTO geral (img_perfil,usuario,texto) VALUES ('$imagePath','$nome_usuario','$post_texto') ");

header('Location: ../../index.php');


?>