<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] == false) {
    header('Location: login.php');
    exit;
}

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
$imagePath = $_SESSION['imagem'];

include "assets/php/conexao.php";
if ($imagePath === "") {
    $sql = mysqli_query($conn,"SELECT * FROM usuario WHERE usuario='$usuario' AND senha='$senha'");
    $row = mysqli_fetch_assoc($sql);
    $dy = $row['img_perfil'];
    $imagePath = "assets".str_replace("..","",$dy);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index/container_s_1.css">
    <link rel="stylesheet" href="assets/css/index/main.css">
    <link rel="stylesheet" href="assets/css/index/add_post.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/script/ajax_atualizando.js"></script>
</head>
<body>
  
    <header>
        <p>Geral</p>
    </header>

    <div class="container_add_post">
        <div class="_add_post_text add">
            + texto
        </div>

        <div class="_add_post_img add">
            + [img]
        </div>

        <form class="_add_text_post_window">
            <span>Adicionar texto</span>
            <input type="hidden" name="usuario" value="<?php echo $usuario?>">
            <input type="hidden" name="ftPerfil" value="<?php echo $imagePath?>">
            <textarea class="_textarea_post_texto" name="post_texto" cols="40" rows="10"></textarea>
            <div class="_buttons">
                <button class="_btn_cancelar_post_text" type="button">Cancelar</button>
                <button class="_btn_enviar_post_text" onclick="dataText()" type="button">Enviar</button>
            </div>
        </form>

        <form class="_add_img_post_window" enctype="multipart/form-data">
            <span>Adicionar Imagem</span>
            <input type="hidden" name="usuario" value="<?php echo $usuario?>">
            <input type="hidden" name="ftPerfil" value="<?php echo $imagePath?>">
            <input class="_input_file_post_img" type="file" name="post_img">
            <textarea class="_textarea_post_img" name="post_img_texto" cols="40" rows="10"></textarea>
            <div class="_buttons">
                <button class="_btn_cancelar_post_img" type="button">Cancelar</button>
                <button class="_btn_enviar_post_img" onclick="dataIMG()" type="button">Enviar</button>
            </div>
        </form>
    </div>
    
    <div class="container_s_1">

        <div class="container_perfil">
            <div class="_perfil_user">
                <img class="_img_perfil" src="<?php echo $imagePath ?>" alt="imagem de perfil">
                <span class="_nome_usuario">User: <?php echo $usuario ?></span>
    
                <ul class="_group_options">
                    <a class="_link_li_options" href="#"><li class="_li_options">Perfil</li></a>
                    <a class="_link_li_options" href="#"><li class="_li_options">Inicio</li></a>
                    <a class="_link_li_options" href="assets/php/logout.php"><li class="_li_options">Sair</li></a>
                </ul>
            </div>
        </div>

        
        <main></main>
        
    </div>
    <span class="btn_scroll_baixo">baixo</span>

    <script src="assets/script/index.js"></script>
    <script src="assets/script/enviando_post.js"></script>
    <script>
        document.querySelector('._input_file_post_img').addEventListener('change', function() {
    var arquivo = querySelector('._input_file_post_img').files[0];
    var tamanhoLimite = 1 * 1024 * 1024;
    if (arquivo && arquivo.size > tamanhoLimite) {
      alert('A imagem selecionada excede o tamanho máximo permitido.');
      querySelector('._input_file_post_img').value = '';
    } 
});
    </script>
</body>
</html>