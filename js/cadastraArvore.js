$('#cadastrarArvore').submit(function() {
    let request = new XMLHttpRequest();

    const url = `validaCadastroArvore.php?lat=${$('#lat').val()}&long=${$('#long').val()}&rua=${$('#rua').val()}&numImovel=${$('#numImovel').val()}` +
        `&distanciaPoste=${$('#postes').val()}&esquina=${$('#esquinas').val()}&distanciaEntreArvore=${$('#entreOutrasArv').val()}` +
        `&distaEntradaGaragem=${$('#garagens').val()}&distanciaLotesVagos=${$('#loteVago').val()}&familia=${$('#familia').val()}` +
        `&nomeCientifico=${$('#nomeCientifico').val()}&nomePopular=${$('#nomePopular').val()}&Origem=${$('input[name=Origem]:checked', '#cadastrarArvore').val()}` +
        `&habito=${$('input[name=habito]:checked', '#cadastrarArvore').val()}` +
        `&toxidez=${$('input[name=toxidez]:checked', '#cadastrarArvore').val()}&alturaArvore=${$('#alturaArvore').val()}&alturaPrimeiraBifurc=${$('#bifurcacao').val()}` +
        `&avalCond=${$('input[name=avalCond]:checked', '#cadastrarArvore').val()}&avalradicular=${$('input[name=avalradicular]:checked', '#cadastrarArvore').val()}` +
        `&LocalPlantio=${$('input[name=LocalPlantio]:checked', '#cadastrarArvore').val()}&larguraCalcada=${$('#largura').val()}` +
        `&Conflitos=${$('input[name=Conflitos]:checked', '#cadastrarArvore').val()}&Poda=${$('input[name=Poda]:checked', '#cadastrarArvore').val()}` +
        `&Pavimentacao=${$('input[name=Pavimentacao]:checked', '#cadastrarArvore').val()}&butao=Enviar`;

    request.open('GET', url, true);

    request.onreadystatechange = function() {
        if (this.readyState == 4)
            if (this.status == 200) {
                if (this.responseText != "Sucesso!") {
                    $('#arvorefalha').html(this.responseText);

                    $('#arvorecomsucesso').css('display', 'none');
                    $('#arvorefalha').css('display', 'block');

                    window.location.href = '#cadastrarArvore';

                    // Checa se os campos estão preenchidos e se são números
                    if ($('#postes').val() === '' || !isNumber($('#postes').val())) {
                        $('#postes').css('border', '1px solid red');

                    } else if (isNumber($('#postes').val()) && !positiveNumber($('#postes').val())) {
                        $('#postes').css('border', '1px solid red');
                    }

                    if ($('#esquinas').val() === '' || !isNumber($('#esquinas').val()))
                        $('#esquinas').css('border', '1px solid red');
                    else if (isNumber($('#esquinas').val()) && !positiveNumber($('#esquinas').val())) {
                        $('#esquinas').css('border', '1px solid red');
                    }

                    if ($('#entreOutrasArv').val() === '' || !isNumber($('#entreOutrasArv').val()))
                        $('#entreOutrasArv').css('border', '1px solid red');
                    else if (isNumber($('#entreOutrasArv').val()) && !positiveNumber($('#entreOutrasArv').val())) {
                        $('#entreOutrasArv').css('border', '1px solid red');
                    }

                    if ($('#garagens').val() === '' || !isNumber($('#garagens').val()))
                        $('#garagens').css('border', '1px solid red');
                    else if (isNumber($('#garagens').val()) && !positiveNumber($('#garagens').val())) {
                        $('#garagens').css('border', '1px solid red');
                    }
                    if ($('#loteVago').val() === '' || !isNumber($('#loteVago').val()))
                        $('#loteVago').css('border', '1px solid red');
                    else if (isNumber($('#loteVago').val()) && !positiveNumber($('#loteVago').val())) {
                        $('#loteVago').css('border', '1px solid red');
                    }
                    if ($('#alturaArvore').val() === '' || !isNumber($('#alturaArvore').val()))
                        $('#alturaArvore').css('border', '1px solid red');
                    else if (isNumber($('#alturaArvore').val()) && !positiveNumber($('#alturaArvore').val())) {
                        $('#alturaArvore').css('border', '1px solid red');
                    }
                    if ($('#bifurcacao').val() === '' || !isNumber($('#bifurcacao').val()))
                        $('#bifurcacao').css('border', '1px solid red');
                    else if (isNumber($('#bifurcacao').val()) && !positiveNumber($('#bifurcacao').val())) {
                        $('#bifurcacao').css('border', '1px solid red');
                    }
                    if ($('#largura').val() === '' || !isNumber($('#largura').val()))
                        $('#largura').css('border', '1px solid red');
                    else if (isNumber($('#largura').val()) && !positiveNumber($('#largura').val())) {
                        $('#largura').css('border', '1px solid red');
                    }
                    if ($('#lat').val() === '' || !isNumber($('#lat').val()))
                        $('#lat').css('border', '1px solid red');

                    if ($('#long').val() === '' || !isNumber($('#long').val()))
                        $('#long').css('border', '1px solid red');

                } else {
                    $('#arvorefalha').css('display', 'none');
                    $('#arvorecomsucesso').css('display', 'block');
                    window.location.href = '#cadastrarArvore';
                    setTimeout("window.location.reload(false)", 1500);
                }
            }
    };

    request.send();

    return false;
});
// falta validar se alguns campos são numeros positivos ou nao; exemplo: campos de comprimento.
function positiveNumber(valor) {
    if (valor > 0)
        return true
    else
        return false;
}

function isNumber(valor) {
    var regra = /^[-0.0-9.0]+$/;

    if (String(valor).match(regra)) {
        console.log("number: " + valor)
        return true;

    } else {
        console.log("not number: " + valor)
        return false;
    }
};