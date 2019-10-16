<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> Perfil de Usuário </title>
    <?php
    include('iconeSite.php'); // ícone do site
    ?>
</head>

<body>
    <div class=" jumbotron bg-success">
        <h2 class="text-center"> Dados da mensagem<h2>
    </div>
    <div class="container row mx-auto">
        <div class="form-group col-md-5 mt-5">
            <!--     PESQUISANDO NO BANCO COM O ID PASSADO PELA URL  -->
            <?php
            require_once('../00 - BD/bd_conexao.php');
            $id = $_GET['id'];
            $sql = "SELECT * FROM solicita where IdSol = $id";
            $result = $con->query($sql) or die("Erro ao se conectar com o Banco.");
            $infoSolicitacao = mysqli_fetch_object($result);
            fecharConexao($con);

            ?>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Name:</span>
                </div>
                <input type="text" class="form-control form-group " id="#" name="nome" value="<?php echo $infoSolicitacao->Nome; ?>   " disabled></input>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">E-mail:</span>
                </div>
                <input type="text" class="form-control form-group" id="#" name="email" value="<?php echo $infoSolicitacao->EmailSol; ?>" disabled></input>
            </div>
            <div class="input-group mb-3">
                <div class=" input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"> Phone:</span>
                </div>
                <input type="text" class="form-control  form-group" id="#" name="telefone" value="<?php echo $infoSolicitacao->Fone; ?>" disabled></input>
            </div>
        </div>
        <div class="form-group col-md-7 mt-4">
            <div class="custom-control custom-checkbox">
                <?php
                if ($infoSolicitacao->statusSol == "lido") { ?>
                    <input type="checkbox" name="checLeitura" class="custom-control-input" id="customCheck1" checked disabled>

                <?php
                } else { ?>
                    <input type="checkbox" name="checLeitura" class="custom-control-input" id="customCheck1" disabled>

                <?php
                }
                ?>
                <label class="custom-control-label" for="customCheck1">lido</label>

            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mensagem:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" disabled><?php echo $infoSolicitacao->texto; ?></textarea>
            </div>


            <form method="GET" action="statusLeitura.php">
                <b>Marcar esta mensagem como:</b>
                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" name="leitura" id="op1" value="lido" class="custom-control-input">
                    <label for="op1" class="custom-control-label">Lida</label>

                </div>
                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" name="leitura" id="op2" value="nao lido" class="custom-control-input">
                    <label for="op2" class="custom-control-label">Não lida</label>

                </div>
                <!--TENHO QUE ESCONDER O CAMPO DE ID OU SENAO DESATIVAR PARA QUE NINGUÉM POSSA  ALTERAR  -->
                <div>

                    <input style="color:white; " class="form-control mb-1 col-1 border border-white" type="numbFer" name="identificador" value="<?php echo $infoSolicitacao->IdSol; ?>">
                </div>

                <input type="submit" name="botao" value="salvar" class="btn btn-primary">
                <a href="solicitacoes.php" class="btn ml-4 btn-warning">Voltar à página anterior</a>
            </form>


        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>