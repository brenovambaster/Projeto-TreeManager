function funcaoTrocaSenha(form) {
    requisicao(form).then(valor => {
        if(valor === 'Senha trocada com sucesso!'){
            alert(valor);
            window.location.reload();
        }else alert(valor);
            
    });
    return false;
}

async function requisicao(form){

    if (form.trocar.value === form.confirma.value){
        data = new FormData(form);

        resposta = await fetch('troca_senha.php', {
            method: 'POST',
            body: data
        });

        valor = await resposta.text();
        return valor;
    }else return 'As senhas são diferentes';
}