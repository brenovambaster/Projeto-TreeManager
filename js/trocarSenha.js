function funcaoTrocaSenha(form) {
    let request = new XMLHttpRequest();

    let params = 'antiga=' + form.senha_atual.value + '&trocar=' + form.nova_senha.value;

    request.open('POST', 'troca_senha.php', true);

    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    request.onreadystatechange = function() {
        if (this.readyState === 4)
            if (this.status === 200) {
                form.nova_senha.value = '';
                form.senha_atual.value = '';
                form.confirma.value = '';
                alert(this.responseText);
            }
    }

    if (form.nova_senha.value === form.confirma.value)
        request.send(params)
    else alert('As senha são diferentes!');
    return false;
}