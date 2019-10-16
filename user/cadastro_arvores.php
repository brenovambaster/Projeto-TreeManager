<?php
include('seguranca.php');
?>
<!doctype html>
<html lang="pt-br">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
        <!-- div top-total. DIV para todo o topo do site
            -->
        <div class="menu">
            <h1> Cadastro de Árvores </h1>
        </div>

        <?php include('navbar.php'); ?>
    </div>



    <!-- ============================================================ Formulário===================== -->
    <div class="container borda-baixo">


        <div class="box-body">
            <form action="validaCadastroArvore.php" method="GET">
                <div class="tituloForm">
                    <h1 class="text-center">Formulário para cadastro das árvores</h1>
                    <hr>
                </div>
                <!-- verificação para ver se o cadastro doi realizado com sucesso ou não: exibir a mensagem            -->
                <?php
                if (isset($_GET['success'])) { ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        A árvore foi inserida com sucesso!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                <?php  }
                if (isset($_GET['error'])) { ?>


                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Algo de errado ocorreu :( Por favor, tente novamente!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>



                <?php  } ?>
                <div class="fundo">
                    <div>
                        <a class="btn btn-success col-12" data-toggle="collapse" href="#Mapeamento-e-localização" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">I- Mapeamento e localização</a>

                        <div class="collapse multi-collapse" id="Mapeamento-e-localização">
                            <div class="form-row">


                                <div class="form-group col-md-4 ">
                                    <label for="text">Cordendas Geográficas:</label>
                                    <input class="form-control" type="text" name="cordGeo">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="text">Rua:</label>
                                    <input class="form-control" type="phone" name="rua" placeholder="Ex: Rua Santa Isabel">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="numImovel"> Nº do imóvel mais próximo </label>
                                    <input class=" form-control" type="text" name="numImovel" placeholder="Ex: A 230">
                                </div>
                            </div>
                            <div class="form-row">

                                <legend>
                                    <h5 class="text-center">Distância da árvore em relação aos equipaentos hurbanos.</h5>
                                </legend>
                                <div class="form-group col-md-2">
                                    <label for="Postes">Postes(m):</label>
                                    <input type="text" name="distanciaPoste" class="form-control" placeholder="Ex: 2.5" aria-describedby="helpId">

                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Esquinas:">Esquinas(m):</label>
                                    <input type="text" name="esquina" class="form-control" placeholder="Ex: 4.9">
                                </div>
                                <div class=" form-group col-md-3 ">
                                    <label for="entreOutrasArv "> Entre outra árvore(m):</label>
                                    <input type="text " name="distanciaEntreArvore" class="form-control " placeholder="Ex: 5.6 ">
                                </div>
                                <div class=" form-group col-md-3 ">
                                    <label for="garagens "> Entrada de garagens(m):</label>
                                    <input type="text " name="distaEntradaGaragem" class="form-control " placeholder="Ex: 5.6 ">
                                </div>
                                <div class=" form-group col-md-2 ">
                                    <label for="loteVago"> Lotes vagos(m):</label>
                                    <input type="text " name="distanciaLotesVagos" class="form-control " placeholder="Ex: 5.6 ">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <a class="btn btn-secondary  col-12" data-toggle="collapse" href="#Características-da-árvore" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">II- Características da árvore</a>

                        <div class="collapse multi-collapse" id="Características-da-árvore">
                            <div class="form-row">

                                <legend> 1. Identificação</legend>
                                <div class="form-group col-md-3">
                                    <label for="familia">Família:</label>
                                    <input type="text" class="form-control" name="familia" placeholder="Rutaceae" style="font-style:italic">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nomeCinetifico">Nome científico:</label>
                                    <input type="text" name="nomeCientifico" class="form-control" placeholder="Murraya paniculata" style="font-style:italic">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nomePopular">Nome popular:</label>
                                    <input type="text" name="nomePopular" class="form-control" placeholder="Murta-de-cheiro" style="font-style:italic">
                                </div>
                            </div>
                            <div class="radios form-row ">
                                <div class=" form-radio col-md-3">
                                    <label>Origem:</label>
                                    <label for="nativa">Nativa:</label> <input class="form-radio-inline" type="radio" name="Origem" value="nativa" checked>
                                    <label for="exotica">Exótica:</label> <input class="form-radio-inline" type="radio" name="Origem" value="exotica">

                                </div><br>

                                <div class=" form-radio col-md-3">
                                    <label>Hábito:</label>
                                    <label for="habitArvore">Árvore:</label> <input class="form-radio-inline" type="radio" name="habito" value="arvore" checked>
                                    <label for="exotica">Arbusto:</label> <input class="form-radio-inline" type="radio" name="habito" value="arbusto">

                                </div>
                                <div class=" form-radio col-md-3">
                                    <label for="toxidez">Toxidez:</label>
                                    <label for="toxiSim">Sim:</label> <input class="form-radio-inline" type="radio" name="toxidez" value="Sim" checked>
                                    <label for="toxiNao">Não:</label> <input class="form-radio-inline" type="radio" name="toxidez" value="Não">

                                </div>
                            </div>
                            <div class="form-row ">
                                <legend>2. Porte da árvore</legend>
                                <div class="form-group col-md-3">
                                    <label for="alturaArvor"> Altura da árvore(m):</label>
                                    <input type="text" name="alturaArvore" class="form-control" placeholder="2.10">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bifurcacao">Altura da 1º bifurcação(m):</label>
                                    <input type="text" name="alturaPrimeiraBifurc" class="form-control" placeholder="1.15">
                                </div>

                            </div>
                            <div class="form-group">
                                <legend>3. Condição físico-sanitária</legend>
                                <div class="form-group col-md-10">
                                    <h5>Avaliação da saúde da árvore:</h5>
                                    <input type="radio" name="avalCond" value="aval1" checked>Árvore vigorosa, sem sinais de pragas, doenças ou danos<br>

                                    <input type="radio" name="avalCond" value="aval2">Árvore com vigor médio, podendo apresentar pequenos danos físicos, problemas de pragas ou doenças<br>

                                    <input type="radio" name="avalCond" value="aval3">Árvore em estágio de declínio e com severos danos de pragas, doenças ou físicos<br>

                                    <input type="radio" name="avalCond" value="aval4">Árvore morta ou com morte iminente
                                </div>

                                <legend>4. Condição do sitema radicular</legend>
                                <div class="form-group col-md-10">
                                    <div>
                                        <h5>Avaliação da possibilidade das raízes superficiais causarem danos:</b></p>
                                        </h5>
                                    </div>
                                    <input type="radio" name="avalradicular" value="avalradicular1" checked> Raiz totalmente subterrânea.
                                    <br>

                                    <input type="radio" name="avalradicular" value="avalradicular2"> Raiz de forma superficial só na área de crescimento da árvore.<br>

                                    <input type="radio" name="avalradicular" value="avalradicular3"> Raiz de forma supercial ultrapassando a área de crescimento da árvore e provocando danos.<br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a class="btn btn-success col-12" data-toggle="collapse" href="#Entorno-e-interferências" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">III- Entorno e interferências</a>
                        <div class="collapse multi-collapse" id="Entorno-e-interferências">

                            <div class=" form-group form-row">

                                <div class="form-radio col-md-6 col-sm-4 ">
                                    <b>Local de Plantio:</b>
                                    <div class="custom-control custom-radio"><input type="radio" class="form-radio-inline" name="LocalPlantio" value="calcada" checked>Calçada</div>
                                    <div class="custom-control custom-radio"><input type="radio" class="form-radio-inline" name="LocalPlantio" value="praca"> Praça</div>
                                    <div class="custom-control custom-radio"> <input type="radio" class="form-radio-inline" name="LocalPlantio" value="ViaPublica"> Via Pública</div>
                                    <div class="custom-control custom-radio"><input type="radio" class="form-radio-inline" name="LocalPlantio" value="Outro"> Outro</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="largura"> Largura da calçada:</label>
                                    <input type="number" name="larguraCalcada" class="form-control">
                                </div>

                            </div>
                            <div class="form-group form-row">
                                <div class="form-group  col-md-4 col-sm-3  borda-direita"> Conflitos: <br>
                                    <div class="custom-control custom-radio"><input type="radio" name="Conflitos" value="redeDeEnergia" checked> Rede de energia</div>
                                    <div class="custom-control custom-radio"><input type="radio" name="Conflitos" value="Construçoes"> Construções</div>
                                    <div class="custom-control custom-radio"> <input type="radio" name="Conflitos" value="outraArvore"> Outra árvore</div>
                                    <div class="custom-control custom-radio"><input type="radio" name="Conflitos" value="Sinalizacao"> Sinalização</div>
                                    <div class="custom-control custom-radio"><input type="radio" name="Conflitos" value="Outro"> Outro<br><br></div>
                                </div>
                                <div class=" form-group col-md-4 col-sm-3 borda-direita "> Poda: <br>
                                    <div class="custom-control custom-radio"><input type="radio" name="Poda" value="podaLeve" checked> Poda leve</div>
                                    <div class="custom-control custom-radio"> <input type="radio" name="Poda" value="Construçoes"> Poda pesada</div>
                                    <div class="custom-control custom-radio"><input type="radio" name="Poda" value="outraArvore"> Sem poda</div>

                                </div>
                                <div class=" form-group col-md-4 col-sm-3 borda-direita "> Pavimentação da calçada <br>
                                    <div class="custom-control custom-radio"><input type="radio" name="Pavimentacao" value="comPavimento" checked> Com pavimento</div>
                                    <div class="custom-control custom-radio"><input type="radio" name="Pavimentacao" value="Construçoes"> Sem pavimento</div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-secondary col-12 " data-toggle="collapse" href="#AcaoRecomendada" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">IV- Ação Recomendada</a>
                        <div class="collapse multi-collapse" id="AcaoRecomendada">
                            <div class="custom-control custom-radio"><input type="radio" name="acaoRecomendada" value="podaLeve1" checked> Poda leve</div>
                            <div class="custom-control custom-radio"><input type="radio" name="acaoRecomendada" value="podaPesada1"> Poda pesada</div>
                            <div class="custom-control custom-radio"><input type="radio" name="acaoRecomendada" value="reparoDanos"> Reparo de danos</div>
                            <div class="custom-control custom-radio"><input type="radio" name="acaoRecomendada" value="substituicao"> Substituição</div>
                            <div class="custom-control custom-radio"><input type="radio" name="acaoRecomendada" value="outro1"> Outro<br><br></div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="text-danger"><b>Observações relevantes:</b></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="observacao" placeholder="Digite aqui o a observação"></textarea>
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




    <div class="rodape text-center">
        <h2> Rodapé da Página </h2>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>