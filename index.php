<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$usuario = $_SESSION['usuario'];
$imagePath = $_SESSION['image'];

if (file_exists($imagePath)) {
    $conteudoImagem = file_get_contents($imagePath);
    $imagemBase64 = base64_encode($conteudoImagem);
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

        <form class="_add_text_post_window" action="assets/php/add_post_text.php" method="get">
            <span>Adicionar texto</span>
            <input type="hidden" name="usuario" value="usuario@123">
            <input type="hidden" name="ftPerfil" value="img_perfil.jpg">
            <textarea class="_textarea_post_texto" name="post_texto" cols="40" rows="10"></textarea>
            <div class="_buttons">
                <button class="_btn_cancelar_post_text" type="button">Cancelar</button>
                <button class="_btn_enviar_post_text" type="submit">Enviar</button>
            </div>
        </form>

        <div class="_add_img_post_window">
            <span>Adicionar Imagem</span>
            <input class="_input_file_post_img" type="file" name="" id="">
            <textarea class="_textarea_post_img" name="" id="" cols="40" rows="10"></textarea>
            <button class="_btn_enviar_post_img">Enviar</button>
        </div>
    </div>
    
    <div class="container_s_1">

        <div class="container_perfil">
            <div class="_perfil_user">
                <img class="_img_perfil" src="<?php echo $imagePath ?>" alt="imagem de perfil">
                <span class="_nome_usuario">User: <?php echo $usuario ?></span>
    
                <ul class="_group_options">
                    <a class="_link_li_options" href="#"><li class="_li_options">Perfil</li></a>
                    <a class="_link_li_options" href="#"><li class="_li_options">Inicio</li></a>
                    <a class="_link_li_options" href="#"><li class="_li_options">Sair</li></a>
                </ul>
            </div>
        </div>

        
        <main>

        <?php

            include "assets/php/conexao.php";

            $sql = mysqli_query($conn,"SELECT * FROM geral");
            
            while ($row = mysqli_fetch_assoc($sql)) {

                if (!empty($row['texto'])) {
                    echo '
                        <div class="post_texto">
                            <div class="_group_usuario_post_text">
                                <img class="_img_perfil_post" src="'.$row['img_perfil'].'">
                                <span class="_nome_usuario_post">'.$row['usuario'].'</span>
                            </div>
                            
                            <div class="_group_conteudo_post_text">
                                <span>'.$row['texto'].'</span>
                            </div>
                        </div>
                    ';
                }

                if (!empty($row['img_post'])) {
                    echo '
                        <div class="post_img">
                            <div class="_group_usuario_post_text">
                                <img class="_img_perfil_post" src="'.$row['img_perfil'].'">
                                <span class="_nome_usuario_post">'.$row['usuario'].'</span>
                            </div>
                            
                            <div class="_group_conteudo_post_img_text">
                                <img class="_img_post" src="assets/img/img_perifl.gif">
                                <p class="_text_post">
                                    <span>'.$row['texto'].'</span>
                                </p>
                            </div>
                        </div>
                    ';
                }

            }

        ?>
        </main>
        
    </div>

    <script src="assets/script/index.js"></script>
</body>
</html>