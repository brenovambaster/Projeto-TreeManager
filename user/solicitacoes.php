<?php
include('seguranca.php');
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/perfil1.css">
    <?php
    include('iconeSite.php'); // ícone do site
    ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> Solicitações de Serviços </title>

</head>

<body>

    <?php include('statusSession.php');   ?>


    <div class="top-total">
        <!-- div top-total. DIV para todo o topo do site
            -->

        <div class="menu">
            <h1> Solicitações de Serviços </h1>
        </div>

        <?php include('navbar.php'); ?>

    </div>

    <!--  ####################   IMPORTANTE!!!  #####################
     PRECISO COLOCAR A FUNÇÃO 'LIDA' PARA SER MOSTRADA NA TABELA DE NOTIFICAÇÕES. 
        ~Como Funciona?~ 
            Quando o usuário clicar em "ver" será redirecionado para a pagina 'verSolicitacao.php'.Nessa página, o usuário vai ver 
            os dados da solicitação e poderá marcar a notificação como 'lida' ou nao. Se maracar a solicitção como lida, irá mostrar 
            na tabela de solicitações a opção marcada. Por enquanto, visualmete será desse modo.No entanto não está implemtentado de forma 
            correta, pois há inconsistência.   
        
    -->

    <div class="container row mx-auto mb-4">
        <div class="pesquisa-form form-group bloco-form col-md-3 mt-2  border-right ">
            <form action="solicitacoes.php" method="GET">
                <div class="form-group col-md-11 col-sm-9">
                    <label for="data"><b>Data:</b></label>
                    <input class="form-control" type="Date" name="data" id="data">
                </div>
                <div class="form-group col-md-11 col-sm-9 ">
                    <label for="codArvore"><b>CodArvore:</b></label>
                    <input type="number" class="form-control" name="codArvore" id="codArvore">

                </div>
                <div class="ml-3">
                    <input type="submit" name="pesquisa" class="btn btn-info" value="pesquisa">
                    <input type="reset" class="btn btn-dark" value="Limpar">

                </div>
            </form>
        </div>
        <?php

        include("pesquisa_solicitacao_servico.php");


        ?>

        <div class=" col-md-9 mt-3 table table-responsive">
            <table class="table table-striped  ">
                <thead>
                    <tr class="bg-success ">
                        <th scope="col">ID</th>
                        <th scope="col">CodAvore</th>
                        <th scope="col">Data</th>
                        <th scope="col">Tipo Servico</th>
                        <th scope="col">Status</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($infoSol = mysqli_fetch_object($resultado)) { ?>
                        <tr>
                            <th> <?php echo $infoSol->codServico; ?> </th>
                            <th> <?php echo $infoSol->codArvore; ?> </th>
                            <td>
                                <?php
                                $date = DateTime::createFromFormat('Y-m-d', $infoSol->dataServico);
                                echo $date->format('d/m/Y');
                                ?>
                            </td>

                            <td><?php echo $infoSol->NomeServico; ?></td>
                            <th>


                                <?php echo $infoSol->statusSer;  ?>

                            </th>
                            <td>
                                <a class="btn-link" href="detalhes_solicitacao.php?id=<?php echo $infoSol->codServico; ?>">
                                    <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                        <?php echo $infoSol->descricao; ?>
                                    </span>
                                </a>
                            </td>
        </div>


        </td>
        </tr>
    <?php } // fechar while 
    ?>
    </tbody>

    </table>
    <?php

    echo '<div class="badge badge-primary text-wrap">' . $sql['filtro'] . '</div>';

    ?>
    <?php
    if (mysqli_num_rows($resultado) == 0) {
        echo "<h5>Sua pesquisa não gerou nenhum resultado. Ou você ainda não possui nenhum registro de 
                solicitação de serviço.</h5>";
    }
    ?>

    </div>


    </div>





















    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>