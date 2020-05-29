<?php include("seguranca.php");

if (!isset($_GET['id'])) { // querer entrar sem passar o id
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=gerenciamento_arvores.php'>";
    exit;
} else {
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#343a40">
        <title>Solicitar serviços</title>
        <meta name="viewport" content="width=dsevice-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/solicitacao_servico.css">
    </head>

    <body>

        <div class="servicos">
            <!-- div top-total. DIV para todo o topo do site
            -->
            <?php include('statusSession.php'); ?>
            <div class="">
                <h1> Solicitação de serviços </h1>

            </div>
            <?php include('navbar.php'); ?>
        </div>


        <section>
            <div class="container">
                <div>
                    <div class="offset-md-3 col-md-10">
                        <form class="col-md-6 col-sm-10" method="POST" action="valida_servico.php">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="id">ID Arvore:</label>
                                    <input class="form-control" name="idAvoreInp" id="id" type="text" value="  <?php echo $id = $_GET["id"];  ?> " readonly>
                                </div>

                                <div class="form-group col-md-7">

                                    <?php
                                    require_once("../00 - BD/bd_conexao.php");
                                    $sql = "SELECT * From tiposervico";
                                    $result = $con->query($sql);
                                    ?>

                                    <label for="selec"> Escolha o tipo de serviço</label>
                                    <select id="selec" name="servico" class=" custom-select form-control">
                                        <?php
                                        while ($infoTipServ = mysqli_fetch_object($result)) { ?>
                                            <option value=" <?php echo $infoTipServ->idTipoServico; ?>"> <?php echo $infoTipServ->NomeServico; ?> </option>

                                        <?php
                                        }
                                        fecharConexao($con);
                                        ?>




                                    </select>
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="descricao"> Descreva o serviço</label>
                                <textarea class="form-control" required name="descricaoServico" id="exampleFormControlTextarea1" rows="4"></textarea>
                            </div>




                            <button type="submit" class="btn btn-primary mb-4">Enviar</button>
                        </form>
                    </div>


                </div>


            </div>

        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

    </html>

<?php
}
?>