$('#cadastrarArvore').submit(function(){
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
                if (this.responseText != "Sucesso!"){
                    $('#arvorefalha').html(this.responseText);

                    $('#arvorecomsucesso').css('display', 'none');
                    $('#arvorefalha').css('display', 'block');

                    window.location.href = '#cadastrarArvore';

                    // Checa se os campos estão preenchidos
                    if($('#postes').val() === '') $('#postes').css('border', '1px solid red');
                    if($('#esquinas').val() === '') $('#esquinas').css('border', '1px solid red');
                    if($('#entreOutrasArv').val() === '') $('#entreOutrasArv').css('border', '1px solid red');
                    if($('#garagens').val() === '') $('#garagens').css('border', '1px solid red');
                    if($('#loteVago').val() === '') $('#loteVago').css('border', '1px solid red');
                    if($('#alturaArvore').val() === '') $('#alturaArvore').css('border', '1px solid red');
                    if($('#bifurcacao').val() === '') $('#bifurcacao').css('border', '1px solid red');
                    if($('#largura').val() === '') $('#largura').css('border', '1px solid red');
                    if($('#lat').val() === '') $('#lat').css('border', '1px solid red');
                    if($('#long').val() === '') $('#long').css('border', '1px solid red');
                }
                else {
                    $('#arvorefalha').css('display', 'none');
                    $('#arvorecomsucesso').css('display', 'block');
                    window.location.href = '#cadastrarArvore';
                    setTimeout("window.location.reload(false)", 2000);
                }
            }
    };

    request.send();

    return false;
});