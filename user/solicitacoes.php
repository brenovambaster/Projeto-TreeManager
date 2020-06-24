<?php
include('seguranca.php');
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#343a40">
    <link rel="stylesheet" type="text/css" href="../css/perfil1.css">
    <?php
    include('iconeSite.php'); // ícone do site
    ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> Solicitações de Serviços </title>

</head>

<body>

    <?php include('statusSession.php');
    seeUrl();
    ?>


    <div class="top-total">
        <!-- div top-total. DIV para todo o topo do site
            -->

        <div class="menu">
            <h1> Solicitações de Serviços </h1>
        </div>

        <?php include('navbar.php'); ?>

    </div>

    <div class="container row mx-auto mb-4">
        <div class="pesquisa-form form-group bloco-form col-md-3 mt-2  border-right ">
            <form action="solicitacoes.php" method="GET">
                <div class="form-group col-md-11 col-sm-9">
                    <label for="data"><b>Data:</b></label>
                    <input class="form-control" type="Date" name="data" id="data">
                </div>
                <div class="form-group col-md-11 col-sm-9 ">
                    <label for="codArvore"><b>Código da Arvore:</b></label>
                    <input type="number" class="form-control" name="codArvore" id="codArvore">
                </div>
                <div class="form-group col-md-11 col-sm-9 ">
                    <label for="statusArv"><b>Status:</b></label>
                    <select class="form-control" id="statusArv" name="statusArv">
                        <option value="">Selecione uma opção</option>
                        <option value="pendente">Pendente</option>
                        <option value="em andamento">Em andamento</option>
                        <option value="concluido">Concluído</option>
                    </select>
                </div>
                <div class="ml-3">
                    <input type="submit" name="pesquisa" class="btn btn-info" value="pesquisa">
                    <input type="reset" class="btn btn-dark" value="Limpar">
                </div>
            </form>
        </div>
        <?php


        ?>


        <div class=" col-md-9 mt-3 table table-responsive">

            <?php
            include("pesquisa_solicitacao_servico.php");

            echo '<div class="badge badge-primary text-wrap">' . $sql['filtro'] . '</div>';
            ?>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
<?php
function seeUrl()
{
    if (isset($_GET['ok'])) { ?>
        <script>
            alert("Sua solicitação de serviço foi enviada. Confira o andamento dela nesta página")
        </script>
    <?php
    }
    if (isset($_GET['not'])) { ?>
        <script>
            alert("Erro ao solicitar serviço;")
        </script>
<?php
    }
}

?>