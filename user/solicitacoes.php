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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> Perfil de Usuário </title>

</head>

<body>

    <?php include('statusSession.php');   ?>


    <div class="top-total">
        <!-- div top-total. DIV para todo o topo do site
            -->

        <div class="menu">
            <h1> Solicitações </h1>
        </div>

        <?php include('navbar.php'); ?>

    </div>

    <!--  ####################   IMPORTANTE!!!  #####################
     PRECISO COLOCAR A FUNÇÃO 'LIDA' PARA SER MOSTRADA NA TABELA DE NOTIFICAÇÕES. 
        ~Como Funciona?~ 
            Quando o usuário clicar em "ver" será redirecionado para a pagina 'verSolicitacao.php'.Nessa página, o usuário vai ver 
            os dados da solicitação e poderá marcar a notificação como 'lida' ou nao. Se maracar a solicitção como lida, irá mostrar 
            na tabela de solicitações a opção marcada. Por enquanto, visualmete será desse modo.No entanto não está implemtentado de forma 
            correta, pois há inconsistência.   -->

    <div class="container row mx-auto ">
        <div class="pesquisa-form form-group bloco-form col-md-3 mt-2  border-right ">
            <form action="Solicitacoes.php" method="GET">
                <div class="form-group col-md-11 col-sm-9">
                    <label for="Especie"><b>Data:</b></label>
                    <input class="form-control" type="Date" name="data">
                </div>
                <div class="form-group col-md-11 col-sm-9 ">
                    <label for="email"><b>E-mail:</b></label>
                    <input type="email" class="form-control" name="email ">

                </div>
                <div class="ml-3">
                    <input type="submit" name="pesquisa" class="btn btn-info" value="Pesquisar">
                    <input type="reset" class="btn btn-dark" value="Limpar">

                </div>
            </form>
        </div>

            <?php
            require_once('../00 - BD/bd_conexao.php');
            $sql = " SELECT * FROM solicita  ORDER BY statusSol desc, DataSol "; // SELECIONA OS USUARIOS POR ORDEM ALFABÉTICA CRESCENTE
            $resultado = $con->query($sql);
            ?>













        <div class=" col-md-9 mt-3 table table-responsive">
            <table class="table table-striped  ">
                <thead>
                    <tr class="bg-success ">
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ação</th>
                        <th>Situação</th>
                    </tr>
                </thead>
                <tbody>

                     <?php while ($infoSol = mysqli_fetch_object($resultado)) { ?>
                    <tr>
                        <th> <?php echo $infoSol->IdSol; ?>      </th>
                        <th> <?php  echo $infoSol->EmailSol;?>   </th>
                        <th> 
                            <?php 
                                $date = DateTime::createFromFormat('Y-m-d', $infoSol->DataSol);
                                echo $date->format('d/m/Y');
                            ?>    
                        </th>

                        <th><a href="verSolicitacao.php?id=<?php echo $infoSol->IdSol; ?>  "> <img src="../img/ver.png" alt="ver" width="30px" height="30px" >  </a></th>
                        <th>
                            <div class="custom-control custom-checkbox ">
                                
                             <?php if($infoSol->statusSol == "nao lido" ){   ?>
                                <input type="checkbox" name="status" class="custom-control-input" disabled  id="situacao">
                                <label class="custom-control-label " for="situacao">Lida</label>
                            <?php }else{ ?>

                                <input type="checkbox" name="status" class="custom-control-input" disabled checked id="situacao">
                                <label class="custom-control-label " for="situacao">Lida</label>


                            <?php } ?> 
                            </div>
                        </th>
                    </tr>
                <?php } // fechar while 
                ?>
                    
                </tbody>
                <?php fecharConexao($con);  ?>
            </table>

        </div>


    </div>





















    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>