<?php
include_once('seguranca.php');
?>
<!doctype html>
<html lang="pt-br">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#343a40">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href=" ../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/formulario-estilo.css">
    <link rel="stylesheet" type="text/css" href="../css/cadestilo.css">
    <?php
    include('iconeSite.php'); // ícone do site
    ?>
    <title>Cadastro de Árvores</title>

</head>

<body>
    <?php include('statusSession.php');   ?>


    <div class="top-total">

        <div class="menu">
            <h1> Cadastro de Árvores </h1>
        </div>

        <?php include('navbar.php'); ?>
    </div>



    <!-- ============================================================ Formulário===================== -->
    <div class="container borda-baixo">


        <div class="box-body">
            <form id="cadastrarArvore" action="validaCadastroArvore.php">
                <div class="tituloForm">
                    <h1 class="text-center">Formulário para cadastro das árvores</h1>
                    <hr>
                </div>
                <!-- verificação para ver se o cadastro foi realizado com sucesso ou não: exibir a mensagem            -->


                <div class="alert alert-success alert-dismissible fade show" id="arvorecomsucesso" style="display:none" role="alert">
                    A árvore foi inserida com sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <div class="alert alert-danger alert-dismissible fade show" id="arvorefalha" style="display:none" role="alert">
                    Algo de errado ocorreu :( Por favor, tente novamente!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-warning alert-dismissible fade show" id="location" style="display:none" role="alert">
                    <p class="dark"> <strong> <?php echo mb_strtoupper($_SESSION['validarSessao']); ?> </strong>, necessitamos das coordenas geográficas das árvores. Você pode autorizar a localização ou não.
                        Se não autorizar, você precisa inserir manualmete a localização com o máximo de precisão possível.
                    </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>




                <div class="fundo">
                    <div>
                        <a class="btn btn-success col-12" data-toggle="collapse" href="#Mapeamento-e-localização" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">I- Mapeamento e localização</a>

                        <div class="show multi-collapse" id="Mapeamento-e-localização">
                            <div class="form-row">



                                <div class="form-group col-md ">
                                    <button class="btn form-control text-center mt-4 text-primary" type="button" onclick="getLocation();"> Preencha as coordenas automaticamente</button>

                                </div>

                                <div class="form-group col-md-4 ">

                                    <label for="lat">Latitude:</label>
                                    <input class="form-control" onfocus="$(this).css('border', '1px solid #ced4da')" id="lat" type="text" name="lat">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="long">Longitude:</label>
                                    <input class="form-control" onfocus="$(this).css('border', '1px solid #ced4da')" id="long" type="text" name="long">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="rua">Rua:</label>
                                    <input class="form-control" id="rua" type="text" name="rua" placeholder="Ex: Rua Santa Isabel">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="numImovel"> Nº do imóvel mais próximo </label>
                                    <input class="form-control" id="numImovel" type="text" name="numImovel" placeholder="Ex: A 230">
                                </div>
                            </div>
                            <div class="form-row">

                                <legend>
                                    <h5 class="text-center">Distância da árvore em relação aos equipamentos urbanos.</h5>
                                </legend>
                                <div class="form-group col-md-2">
                                    <label for="postes">Postes(m):</label>
                                    <input type="text" onfocus="$(this).css('border', '1px solid #ced4da')" id="postes" name="distanciaPoste" class="form-control" placeholder="Ex: 2.5" onkeypress="return somenteNumeros(event)" aria-describedby="helpId">

                                </div>
                                <div class="form-group col-md-2">
                                    <label for="esquinas">Esquinas(m):</label>
                                    <input type="text" id="esquinas" onfocus="$(this).css('border', '1px solid #ced4da')" name="esquina" class="form-control" onkeypress="return somenteNumeros(event)" placeholder="Ex: 4.9">
                                </div>
                                <div class=" form-group col-md-3 ">
                                    <label for=" entreOutrasArv"> Entre outra árvore(m):</label>
                                    <input type="text" id="entreOutrasArv" onfocus="$(this).css('border', '1px solid #ced4da')" name="distanciaEntreArvore" class="form-control" onkeypress="return somenteNumeros(event)" placeholder="Ex: 5.6 ">
                                </div>
                                <div class=" form-group col-md-3 ">
                                    <label for=" garagens"> Entrada de garagens(m):</label>
                                    <input type="text" id="garagens" onfocus="$(this).css('border', '1px solid #ced4da')" name="distaEntradaGaragem" class="form-control " placeholder="Ex: 5.6 " onkeypress="return somenteNumeros(event)">
                                </div>
                                <div class=" form-group col-md-2 ">
                                    <label for=" loteVago"> Lotes vagos(m):</label>
                                    <input type="text" id="loteVago" onfocus="$(this).css('border', '1px solid #ced4da')" name="distanciaLotesVagos" class="form-control " placeholder="Ex: 5.6 " onkeypress="return somenteNumeros(event)">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <a class=" btn btn-secondary col-12" data-toggle="collapse" href="#Características-da-árvore" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">II- Características da árvore</a>

                        <div class="show multi-collapse" id="Características-da-árvore">
                            <div class="form-row">

                                <legend> 1. Identificação</legend>
                                <div class="form-group col-md-3">
                                    <label for="familia">Família:</label>
                                    <input type="text" id="familia" class="form-control" name="familia" placeholder="Rutaceae" style="font-style:italic">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nomeCinetifico">Nome científico:</label>
                                    <input type="text" id="nomeCientifico" name="nomeCientifico" class="form-control" placeholder="Murraya paniculata" style="font-style:italic">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nomePopular">Nome popular:</label>
                                    <input type="text" id="nomePopular" name="nomePopular" class="form-control" placeholder="Murta-de-cheiro" style="font-style:italic">
                                </div>
                            </div>
                            <div class="radios form-row ">
                                <div class=" form-radio col-md-3">
                                    <label>Origem:</label>
                                    <label for="nativa">Nativa:</label>
                                    <input class="form-radio-inline" id="nativa" type="radio" name="Origem" value="nativa" checked>
                                    <label for="exotica">Exótica:</label>
                                    <input class="form-radio-inline" id="exotica" type="radio" name="Origem" value="exotica">

                                </div><br>

                                <div class=" form-radio col-md-3">
                                    <label>Hábito:</label>
                                    <label for="habitArvore">Árvore:</label>
                                    <input class="form-radio-inline" id="habitArvore" type="radio" name="habito" value="arvore" checked>
                                    <label for="arbusto">Arbusto:</label>
                                    <input class="form-radio-inline" id="arbusto" type="radio" name="habito" value="arbusto">

                                </div>
                                <div class=" form-radio col-md-3">
                                    <label class="">Toxidez:</label>
                                    <label for="toxiSim">Sim:</label>
                                    <input class="form-radio-inline" id="toxiSim" type="radio" name="toxidez" value="sim" checked>
                                    <label for="toxiNao">Não:</label>
                                    <input class="form-radio-inline" id="toxiNao" type="radio" name="toxidez" value="nao">

                                </div>
                            </div>
                            <div class="form-row ">
                                <legend>2. Porte da árvore</legend>
                                <div class="form-group col-md-3">
                                    <label for="alturaArvor"> Altura da árvore(m):</label>
                                    <input type="text" id="alturaArvore" onfocus="$(this).css('border', '1px solid #ced4da')" name="alturaArvore" class="form-control" placeholder="2.10" onkeypress="return somenteNumeros(event)">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bifurcacao">Altura da 1º bifurcação(m):</label>
                                    <input type="text" id="bifurcacao" onfocus="$(this).css('border', '1px solid #ced4da')" name="alturaPrimeiraBifurc" class="form-control" placeholder="1.15" onkeypress="return somenteNumeros(event)">
                                </div>

                            </div>
                            <div class="form-group">
                                <legend>3. Condição físico-sanitária</legend>
                                <div class="form-group col-md-10">
                                    <h5>Avaliação da saúde da árvore:</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="avalCond" value="aval1" id="aval1" checked>
                                        <label class="form-check-label" for="aval1"> Árvore vigorosa, sem sinais de pragas, doenças ou danos</label><br>

                                        <input class="form-check-input" type="radio" name="avalCond" value="aval2" id="aval2">
                                        <label class="form-check-label" for="aval2"> Árvore com vigor médio, podendo apresentar pequenos danos físicos, problemas de pragas ou doenças</label><br>

                                        <input class="form-check-input" type="radio" name="avalCond" value="aval3" id="aval3">
                                        <label class="form-check-label" for="aval3"> Árvore em estágio de declínio e com severos danos de pragas, doenças ou físicos</label><br>

                                        <input class="form-check-input" type="radio" name="avalCond" value="aval4" id="aval4">
                                        <label class="form-check-label" for="aval4"> Árvore morta ou com morte iminente </label>
                                    </div>
                                </div>

                                <legend>4. Condição do sitema radicular</legend>
                                <div class="form-group col-md-10">
                                    <div>
                                        <h5>Avaliação da possibilidade das raízes superficiais causarem danos:</b></p>
                                        </h5>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" id="avalRad1" type="radio" name="avalradicular" value="avalradicular1" checked>
                                        <label class="form-check-label" for="avalRad1"> Raiz totalmente subterrânea. </label> </br>

                                        <input class="form-check-input" id="avalRad2" type="radio" name="avalradicular" value="avalradicular2">
                                        <label class="form-check-label" for="avalRad2"> Raiz de forma superficial só na área de crescimento da árvore.</label> <br>

                                        <input class="form-check-input" id="avalRad3" type="radio" name="avalradicular" value="avalradicular3">
                                        <label class="form-check-label" for="avalRad3"> Raiz de forma supercial ultrapassando a área de crescimento da árvore e provocando danos. </label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a class="btn btn-success col-12" data-toggle="collapse" href="#Entorno-e-interferências" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">III- Entorno e interferências</a>
                        <div class="show multi-collapse" id="Entorno-e-interferências">

                            <div class=" form-group form-row">

                                <div class="form-radio col-md-6 col-sm-4 ">
                                    <b>Local de Plantio:</b>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="form-radio-inline" name="LocalPlantio" id="calcada" value="calcada" checked>
                                        <label class="form-check-label" for="calcada"> Calçada</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="form-radio-inline" name="LocalPlantio" id="praca" value="praca">
                                        <label class="form-check-label" for="praca"> Praça</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="form-radio-inline" name="LocalPlantio" id="ViaPublica" value="ViaPublica">
                                        <label class="form-check-label" for="ViaPublica"> Via Pública</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="form-radio-inline" name="LocalPlantio" id="Outro" value="Outro">
                                        <label class="form-check-label" for="Outro"> Outro</label>
                                    </div>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="largura"> Largura da calçada:</label>
                                    <input type="text" id="largura" onfocus="$(this).css('border', '1px solid #ced4da')" name="larguraCalcada" class="form-control" onkeypress="return somenteNumeros(event)">
                                </div>

                            </div>
                            <div class="form-group form-row">
                                <div class="form-group  col-md-4 col-sm-3  borda-direita"> Conflitos: <br>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="Conflitos" id="redeDeEnergia" value="redeDeEnergia" checked>
                                        <label for="redeDeEnergia"> Rede de energia</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="Conflitos" id="Construçoes" value="Construçoes">
                                        <label for="Construçoes"> Construções</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="Conflitos" id="outraArvore" value="outraArvore">
                                        <label for="outraArvore"> Outra árvore</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="Conflitos" id="Sinalizacao" value="Sinalizacao">
                                        <label for="Sinalizacao"> Sinalização </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="Conflitos" id="outro_confl" value="Outro">
                                        <label for="outro_confl"> Outro </label><br><br>
                                    </div>
                                </div>
                                <div class=" form-group col-md-4 col-sm-3 borda-direita "> Poda: <br>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="Poda" id="podaLeve" value="podaLeve" checked>
                                        <label for="podaLeve"> Poda leve</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="Poda" id="podaPesada" value="podaPesada">
                                        <label for="podaPesada"> Poda pesada</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="Poda" id="semPoda" value="semPoda">
                                        <label for="semPoda"> Sem poda</label>
                                    </div>
                                </div>
                                <div class=" form-group col-md-4 col-sm-3 borda-direita "> Pavimentação da calçada <br>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="Pavimentacao" id="comPavimento" value="comPavimento" checked>
                                        <label for="comPavimento"> Com pavimento </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="Pavimentacao" id="semPavimento" value="semPavimento">
                                        <label for="semPavimento"> Sem pavimento</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input class="btn btn-primary col-2 col-xs-3" type="submit" name="butao" value="Enviar">
                    <input class="btn btn-danger col-2 col-xs-3" type="reset" value="Limpar">
                </div>

            </form>

        </div>
    </div>

    <!--===========================================script=================================================	-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/somenteNum.js"></script>
    <script src="../js/cadastraArvore.js"></script>
    <script src="../js/getLocation.js"></script>
</body>

</html>