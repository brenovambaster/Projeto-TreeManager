<?php include("seguranca.php") ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    include('iconeSite.php'); // ícone do site
    ?>
    <link rel="stylesheet" href="../css/detalhes_solicitacao.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes solicitação serviço</title>
</head>

<body>

    <div class="topo">
        <?php include('statusSession.php');   ?>
        <div class="menu">

            <h1 class="text-center">Detalhes da solicitação de serviço </h1>

        </div>
        <?php include("navbar.php") ?>
    </div>


    <section>
        <div class="mt-4">
            <div class="row">
                <div class="ml-1 col-md-4">
                    <?php
                    require_once("pesquisa_detalhes_solicitacao.php");

                    $result = search_attendance_service();
                    $infoSolicitacao = mysqli_fetch_object($result['servico']);
                    ?>
                    <div class="form-group col-md-4 col-sm-8">
                        <span class="badge badge-primary">Status: <?php echo $infoSolicitacao->statusSer; ?> </span>
                        <label for="idservico"><b>ID serviço:</b></label>
                        <input class="form-control" type="text" name="idservico" id="idservico" value="<?php echo $infoSolicitacao->codServico; ?>" disabled>
                        <label for="CodArvore"><b>CodArvore:</b></label>
                        <input class="form-control" type="text" name="CodArvore" id="CodArvore" value="<?php echo $infoSolicitacao->codArvore; ?>" disabled>
                    </div>

                    <div class="form-group col-md-6 col-sm-8">
                        <label for="data"><b>Data:</b></label>
                        <input class="form-control" type="text" name="data" id="data" value="<?php echo $infoSolicitacao->dataServico; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6 col-sm-8">
                        <label for="tipo"> <b>Tipo de serviço </b></label>
                        <input class="form-control" type="text" name="serviço" id="tipo" value="<?php echo $infoSolicitacao->NomeServico; ?>" disabled>

                    </div>
                    <div class="form-group col-md-7 col-sm-8">
                        <label for="des"><b> Descriçao do serviço:</b></label>
                        <textarea class="form-control" name="descricao" id="desc" disabled> <?php echo $infoSolicitacao->descricao; ?> </textarea>

                    </div>

                </div>



                <div class=" col-md-7 col-sm-12 ml-1 mr-1">
                    <h2 class="">Atendimentos vinculados a esse serviço</h2>

                    <div class=" table table-responsive">
                        <?php
                        tabela($result['atendimento']);
                      
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>