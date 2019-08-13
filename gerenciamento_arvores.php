<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/gerencia_arvores_estilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Gerencimaneto de árvores</title>

</head>

<body>
    <div class="sair">
        <a class="exit opc" href="index.php"><img src="img/sair.png" height="30px" width="30px"> Sair </a>
    </div>

    <div class="menu">
        <div class="top-total">
            <!-- div top-total. DIV para todo o topo do site
			-->
            <div class="title">
                <h1> Gerenciamento de Árvores </h1>
            </div>

            <nav class="navbar navbar-expand-lg ">
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <a class="navbar-brand" href="#">
                        <img src="img/menu.png" alt="Menu">
                        <a class="navbar-brand" href="#"> <b>Menu</b> </a>
                    </a>
                </button>
                <div class="collapse navbar-collapse justify-content-center hovermouse " id="collapsibleNavbar">
                    <ul class="nav nav-pills navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link opc" href="perfil.php"> <img src="img/perfil.png" height="30px" width="30px"> Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ap" href="gerenciamento_arvores.php"> <img src="img/gerenciamento_informacoes.png" height="30px" width="30px">Gerenciamento de Árvores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link opc" href="cadastro_arvores.php"> <img src="img/add.png" height="30px" width="30px">Cadastro de Árvores</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>

    </div>

    <form method="get">
        <div class="form">
            <div class="title2">
                <p><br>Pesquisar Árvore
                    <p>
            </div>

            <div class="campos">
                <br>&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID da Árvore: <input class="input" type="text" name="idArv"><br>
                <br>&emsp;&emsp;Espécie da Árvore: <input class="input" type="text" name="espArv"><br>
                <br>&nbsp;Ponto de Referência: <input class="input" type="text" name="pontoRef">
            </div>

            <br><br><button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-xl">Pesquisar</button> &nbsp;
            <button type="reset" class="btn btn-dark">Limpar</button>
            <br><br><br>
        </div>
    </form>


    <!-- ==========================================Modal============================================= -->

    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class=" container">
                    <table class="table table-striped ">
                        <thead>
                            <tr class="bg-success">
                                <th scope="col">ID</th>
                                <th scope="col">Espécie</th>
                                <th scope="col">Ponto de referência</th>
                                <th scope="col">Coordenada</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Policlínica Salinense</td>
                                <td>@mdo</td>
                                <td> <a href="formulario.php"> Editar </a>  <a href="#"> Excluir </a>  <a href="formulario.php"> Ver </a> </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Fofocas</td>
                                <td>@fat</td>
                                <td> <a href="formulario.php"> Editar </a>  <a href="#"> Excluir </a>  <a href="formulario.php"> Ver </a> </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>Paladar</td>
                                <td>@twitter</td>
                                <td> <a href="formulario.php"> Editar </a>  <a href="#"> Excluir </a>  <a href="formulario.php"> Ver </a> </td>
                            </tr>

                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>



            </div>
        </div>
    </div>


    <div class="rodape text-center">
        <h2> Rodapé da Página </h2>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>