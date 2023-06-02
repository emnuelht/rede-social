<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="get" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="text" name="usuario">
        <button type="submit" name="submit">Logar</button>
    </form>
    
</body>
</html>

<?php

include "assets/php/conexao.php";

if (isset($_GET['submit'])) {

    $imagem = $_GET["image"];

    $nome = $imagem['name'];
    $tipo = $imagem['type'];
    $tamanho = $imagem['size'];
    $tmp = $imagem['tmp_name'];

    
    $pastaDestino = 'assets/img_perfil/' . $nome;

    
    if (strpos($tipo, 'image') !== false) {
        echo "o";
        
        move_uploaded_file($tmp, $pastaDestino);

        $query = "INSERT INTO usuario (img_perfil, usuario) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $pastaDestino, $usuario);

        mysqli_stmt_execute($stmt);
        
        session_start();
        $_SESSION['image'] = $imagePath;
        $_SESSION['usuario'] = $usuario;
        
        header('Location: index.php');
    } else {
        echo "ERRo";
    }
}

?>