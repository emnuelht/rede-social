let addText = document.querySelector('._add_post_text');
let windowText = document.querySelector('._add_text_post_window');
let btnCancelarPostText = document.querySelector('._btn_cancelar_post_text');
let textArea = document.querySelector('._textarea_post_texto');

addText.addEventListener('click', ()=> {
    windowText.style.display = 'flex';
});

btnCancelarPostText.addEventListener('click',()=> {
    windowText.style.display = 'none';
    textArea.value = '';
});