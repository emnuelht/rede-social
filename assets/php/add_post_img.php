<?php

include "conexao.php";

$nome_usuario = $_POST['usuario'];
$imagePathPerfil = $_POST["ftPerfil"];
$post_img = $_FILES['post_img']['name'];
$post_texto = $_POST['post_img_texto'];
$imagePathIMG = "../img/".$post_img;
$diretorio = "assets/img/".$post_img;

move_uploaded_file($_FILES['post_img']['tmp_name'], $imagePathIMG);

mysqli_query($conn, "INSERT INTO geral (img_perfil,usuario,img_post,texto_img) VALUES ('$imagePathPerfil','$nome_usuario','$diretorio','$post_texto'); ");

header('Location: ../../index.php');


?>