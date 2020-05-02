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
                    if (mysqli_num_rows($result['servico']) == 0) {
                        echo " <div class='text-center text-danger'> <h2>Essa solicitação  não existe. </h2> </div>";
                    } else {
                        $infoSolicitacao = mysqli_fetch_object($result['servico']);
                        detalhes_solic_servico($infoSolicitacao); // exibe os dados da solicitação de serciço;
                    }

                    ?>


                </div>



                <div class=" col-md-7 col-sm-12 ml-1 mr-1">
                    <h2 class="">Atendimentos vinculados a essa solicitação</h2>

                    <div class=" table table-responsive">
                        <?php
                        tabela_atendimento($result['atendimento']);

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