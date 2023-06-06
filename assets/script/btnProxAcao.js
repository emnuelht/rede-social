let btnProx = document.querySelector('.btn_prox');
let part1form = document.querySelector('.part1_form');
let part2form = document.querySelector('.part2_form');

btnProx.addEventListener('click',()=> {
    part2form.style.right = '0';
    part2form.style.opacity = '1';
    part1form.style.opacity = '0';

    setTimeout(()=> {
        part1form.style.visibility  = 'hidden';
    },500);
});


let fimText = document.querySelector('h2');

let btnProxFim = document.querySelector('.btn_prox_fim');
let part3form = document.querySelector('.part3_form_fim');

btnProxFim.addEventListener('click',()=> {
    let usuario = document.querySelector('#usuario').value;
    
    part2form.style.opacity = '0';
    part3form.style.right = '0';
    part3form.style.opacity = '1';
    fimText.innerHTML = `Seja Bem-Vindo ${usuario}`;

    setTimeout(()=> {
        part2form.style.visibility  = 'hidden';
    },500);
});