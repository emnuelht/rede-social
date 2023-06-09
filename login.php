<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Document</title>
</head>
<body>

    <form method="post">
        
        <h1>Login</h1>

        <label class="inputLabel" for="usuario">Usuario:</label>
        <input type="text" class="inputUser" name="usuario" id="usuario" placeholder="user@123" required autocomplete="off">

        <label class="inputLabel" for="senha">Senha</label>
        <input type="password" class="inputUser" name="senha" id="senha" placeholder="*******" required autocomplete="off">
        
        <span class="alert_senha">usuario ou senha invalido!</span>
        
        <button class="btnUser" name="submit" type="submit">Logar</button>
        
        <a href="cadastro.html" style="margin-top: 20px;width: 100%;text-align: end;font-size: 9pt;text-decoration: none;">Não tem uma conta? cadastre-se aqui</a>
        
    </form>
    
</body>
</html>

<?php

include "assets/php/conexao.php";

if (isset($_POST['submit'])) {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = mysqli_query($conn,"SELECT * FROM usuario WHERE usuario='$usuario' AND senha='$senha' ");
    $row = mysqli_fetch_assoc($sql);

    if (isset($row)) {

        session_start();
        $_SESSION['imagem'] = "";
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        
        header('Location: index.php');
        
        echo "<script>document.querySelector('.alert_senha').style.display = 'none'</script>";
    } else {
        echo "<script>document.querySelector('.alert_senha').style.display = 'flex'</script>";
    }   

}

?>