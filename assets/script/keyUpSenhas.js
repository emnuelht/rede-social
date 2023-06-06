document.querySelector('.btn_prox').style.display = 'none';
document.querySelector('#senha').addEventListener('keyup', function(event) {
    let senha = event.target.value;
    let senhaAlertA = document.querySelector('.a');
    let senhaAlertB = document.querySelector('.b');
    
    if (senha.length >= 8) {
        senhaAlertA.style.color = 'green';
        setTimeout(()=> {
            senhaAlertA.style.display = 'none';
        },1000);
    } else if (senha.length === 0) {
        senhaAlertA.style.display = 'none';
    } else {
        senhaAlertA.style.display = 'flex';
        senhaAlertA.style.color = 'red';
    }


    document.querySelector('#conf_senha').addEventListener('keyup', function(e) {
        let confSenha = e.target.value;
        
        if (confSenha.length >= 8 && confSenha === senha) {
            senhaAlertB.style.display = 'none';
        } else if (confSenha.length >= 8 && confSenha !== senha){
            senhaAlertB.style.display = 'flex';
            senhaAlertB.style.color = 'red';

            setTimeout(()=> {
                document.querySelector('.btn_prox').style.display = 'flex';
            },1000);
        }
    });
});