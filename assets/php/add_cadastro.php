<?php

include "conexao.php";

$usuario = $_POST['usuario'];
$destino = '../img_perfil/';
$nomeArquivo = $_FILES['img_perfil']['name'];
$senha = $_POST['senha'];

$imagePath = $destino . $nomeArquivo;

if (!empty($nomeArquivo)) {
    if (move_uploaded_file($_FILES['img_perfil']['tmp_name'], $imagePath)) {

        mysqli_query($conn,"INSERT INTO usuario (img_perfil,usuario,senha) VALUES ('$imagePath','$usuario','$senha')");
        
        session_start();
        $_SESSION['imagem'] = "assets/img_perfil/".$nomeArquivo;
        $_SESSION['usuario'] = $usuario;
        
        header('Location: ../../index.php');
    } else {
        echo "Faled";
    }
} else {
    $imagePath = "assets/img_perfil/padrao.png";
    mysqli_query($conn,"INSERT INTO usuario (img_perfil,usuario) VALUES ('$imagePath','$usuario')");
    
    session_start();
    $_SESSION['imagem'] = $imagePath;
    $_SESSION['usuario'] = $usuario;
    
    header('Location: index.php');
}

?>