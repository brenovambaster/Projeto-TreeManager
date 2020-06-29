$('#cadastraNewUser').submit(function(){    
    cadastrarNewUser(this).then(valor => {
        if (valor !== 'Sucesso!')
            alert(valor);
        else window.location.href = 'index.php?new_user_success';
    });
    return false; 
});

async function cadastrarNewUser(formulario){
    data = new FormData(formulario);

    resposta = await fetch('valida_new_user.php', {
        method: 'POST',
        body: data
    });

    valor = await resposta.text();
    return valor;
}