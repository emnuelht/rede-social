document.querySelector('._input_file_post_img').addEventListener('change', function() {
    var arquivo = inputImagem.files[0];
    var tamanhoLimite = 1 * 1024 * 1024;
    if (arquivo && arquivo.size > tamanhoLimite) {
      alert('A imagem selecionada excede o tamanho máximo permitido.');
      inputImagem.value = '';
    } else {
        // enviando dados pro php texto e img
        function dataIMG() {
            let form = document.querySelector('._add_img_post_window');
            let formTextArea = document.querySelector('._textarea_post_img');
            let formFile = document.querySelector('._input_file_post_img');
            let formData = new FormData(form);

            $.ajax({
                url: 'assets/php/add_post_img.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {}
            });
            form.style.display = 'none';
            formFile.value = '';
            formTextArea.value = '';
        }

        function dataText() {
            let form = document.querySelector('._add_text_post_window');
            let formTextArea = document.querySelector('._textarea_post_texto');
            let formData = new FormData(form);

            $.ajax({
                url: 'assets/php/add_post_text.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {}
            });
            form.style.display = 'none';
            formTextArea.value = '';
        }
    }
});
