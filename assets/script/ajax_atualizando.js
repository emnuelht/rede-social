$(document).ready(function() {
    let container = $('main');
    setInterval(function() {
    $.ajax({
        url: 'assets/php/dados_bd.php',
        dataType: 'json',
        success: function(data) {
        $('main').empty();

            $.each(data, function(index, row) {

                if (row.texto!="") {
                    $('main').append('<div class="post_texto"><div class="_group_usuario_post_text"><img class="_img_perfil_post" src="'+row.img_perfil+'"><span class="_nome_usuario_post">'+row.usuario+'</span><span class="data">'+row.data.substring(11, 16)+'</span></div><div class="_group_conteudo_post_text"><span>'+row.texto+'</span></div></div>');
                }
                if (row.img_post!="") {
                    $('main').append('<div class="post_img"><div class="_group_usuario_post_text"><img class="_img_perfil_post" src="'+row.img_perfil+'"><span class="_nome_usuario_post">'+row.usuario+'</span><span class="data">'+row.data.substring(11, 16)+'</span></div><div class="_group_conteudo_post_img_text"><img class="_img_post" src="'+row.img_post+'"><p class="_text_post"><span>'+row.texto_img+'</span></p></div></div>');
                }

                if (row.dt == 0) {
                    container.scrollTop(container[0].scrollHeight);
                    $.ajax({
                        url: 'assets/php/dado_novo.php',
                        type: 'POST',
                        data: { dt: 1 },
                        success: function(response) {}
                    });
                }

            });
        }
    });

    }, 500);
});