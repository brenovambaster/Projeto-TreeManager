<?php
include('seguranca.php');
?>

<!doctype html>
<html lang="pt-br">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/gerencia_arvores_estilo2.css">
    <!-- Icone da pagina -->
    <?php
    include('iconeSite.php'); // ícone do site
    ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Gerencimaneto de árvores</title>

</head>

<body>
    <?php include('statusSession.php');   ?>


    <div class="top-total">
        <!-- div top-total. DIV para todo o topo do site
			-->
        <div class="navegacao">
            <h1> Gerenciamento de Árvores </h1>
        </div>
        <?php include('navbar.php'); ?>
    </div>


    <!-- ====================== PESQUISAR ARVORE POR FORMULARIO ==================================================================  -->
    <div class="container row mx-auto">
        <div class="pesquisa-form form-group bloco-form col-md-3 mt-2  border-right ">
            <form action="gerenciamento_arvores.php" method="POST">
                <div class="form-group  col-md-11 col-sm-9  ">
                    <label for="ID"><b> ID:</b></label>
                    <input class="form-control" type="number" name="ID" disabled>
                </div>
                <div class="form-group col-md-11 col-sm-9">
                    <label for="Especie"><b>Nome científico:</b></label>
                    <input class="form-control" type="text" name="Especie">
                </div>
                <div class="form-group col-md-11 col-sm-9 ">
                    <label for="rua"><b>Rua:</b></label>
                    <input type="text" class="form-control" name="rua">

                </div>
                <div class="ml-3">
                    <input type="submit" name="pesquisa" class="btn btn-info" value="Pesquisar">
                    <input type="reset" class="btn btn-dark" value="Limpar">

                </div>
            </form>
        </div>

        <!--====================================== Fim de pesquisa =========================================================================================-->
        <!--Mostrar resultado da pesquisa na tabela -->


        <?php

        include("pesquisa_arvore.php");
        ?>
        <div class="col-md-9 mt-3 table table-responsive">
            <table class="table table-striped  ">
                <thead>
                    <tr class="bg-success">
                        <th scope="col">ID</th>
                        <th scope="col">Nome científico</th>
                        <th scope="col">Rua</th>
                        <th scope="col">Coordenada</th>
                        <th scope="col">Situação </th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($informacaoArvore = mysqli_fetch_object($resultado)) { ?>
                        <tr>
                            <th scope="row"><?php echo $informacaoArvore->IdArvore; ?></th>
                            <td> <?php echo $informacaoArvore->NomeCientifico; ?></td>
                            <td><?php echo $informacaoArvore->Rua; ?></td>
                            <td><?php echo $informacaoArvore->CordGeo; ?></td>
                            <td><?php echo $informacaoArvore->Situacao; ?></td>
                            <td>
                                <a href="formulario.php?id=<?php echo $informacaoArvore->IdArvore; ?>"> Editar </a>
                                <a href="excluirArvore.php?id=<?php echo $informacaoArvore->IdArvore; ?>"> Excluir </a>
                                <a href="formulario.php?id=<?php echo $informacaoArvore->IdArvore; ?>"> Ver </a>
                                <a href="solicitar_servico.php?id=<?php echo $informacaoArvore->IdArvore; ?>"> Solicitar Serviço </a>
                            </td>
                        </tr>

                    <?php
                    } //while
                    ?>

                </tbody>

            </table>
            <?php // VERIFICAR SE A PESQUISA GEROU ALGUM RESULTADO
            if (mysqli_num_rows($resultado) == 0) {
                echo "<h5>Sua pesquisa não gerou nenhum resultado. A árvore não foi encontrada.</h5>";
            }
            ?>

        </div>



















        <?php // mostrar modal "alert" 
        if (isset($_GET['success'])) { ?>
            <script>
                alert("Árvore exluída com sucesso");
            </script>
        <?php
        }
        ?>
    </div>

    </div>

    <!--
    <div class="rodape text-center">
        <h2> Rodapé da Página </h2>
    </div>
                -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>