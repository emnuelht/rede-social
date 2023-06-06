document.getElementById('img_perfil').addEventListener('change', function(event) {
    let file = event.target.files[0];
    let reader = new FileReader();

    reader.onload = function(event) {
        document.querySelector('.img_perfil_cadastro').setAttribute('src', event.target.result);
    }

    reader.readAsDataURL(file);
});