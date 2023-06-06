// texto post
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

// img post
let addIMG = document.querySelector('._add_post_img');
let windowIMG = document.querySelector('._add_img_post_window');
let btnCancelarPostIMG = document.querySelector('._btn_cancelar_post_img');
let textAreaIMG = document.querySelector('._btn_enviar_post_img');

addIMG.addEventListener('click', ()=> {
    windowIMG.style.display = 'flex';
});

btnCancelarPostIMG.addEventListener('click',()=> {
    windowIMG.style.display = 'none';
    textAreaIMG.value = '';
});


// verificar se o scroll ta embaixo
let div = document.querySelector('main');
let scrollBtn = document.querySelector('.btn_scroll_baixo');

div.addEventListener('scroll', function() {
  let scrollTop = div.scrollTop;
  let scrollHeight = div.scrollHeight;
  let clientHeight = div.clientHeight;

  if (scrollTop + clientHeight < scrollHeight) {
    scrollBtn.style.display = 'flex';

    scrollBtn.addEventListener('click', ()=> {
        div.scrollTop = div.scrollHeight;
    })
  } else {
    scrollBtn.style.display = 'none';
  }
});
