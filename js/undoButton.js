let nome, email, fone;

let request = new XMLHttpRequest();

request.open('GET', 'troca_senha.php?params=1', true);

request.onreadystatechange = function() {
    if (this.readyState === 4)
        if (this.status === 200) {
            if (this.responseText === '') {} else {
                elements = this.responseText.split(',');
                [nome, email, fone] = elements;
            }
        }
}

request.send();

function botaoDesfazer() {
    if ($('#nomeComp').val().trim() !== nome.trim() ||
        $('#email').val().trim() !== email.trim() ||
        $('#telefone').val().trim() !== fone.trim()){
            $('#desfazerTudo').prop('disabled', false);
            $('#salvarMudancas').prop('disabled', false);
        }else {
        $('#desfazerTudo').prop('disabled', true);
        $('#salvarMudancas').prop('disabled', true);
    }
}

function disableBoth(){
    $('#nomeComp').val(nome.trim());
    $('#email').val(email.trim());
    $('#telefone').val(fone.trim());

    $('#desfazerTudo').prop('disabled', true);
    $('#salvarMudancas').prop('disabled', true);
}