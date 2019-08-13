<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/css_CadastroUsuario.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> Administrador - Cadastrar Usuário </title>

</head>

<body>
    <div class="top-total">
        <div class="sair">
            <a class="exit opc" href="index.php"><img src="img/sair.png" height="30px" width="30px"> Sair </a>
        </div>
        <div class="menu">
            <div class="top-total">
                <div class="title">
                    <h1> Cadastrar Usuário </h1>
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

                                <a class="nav-link ap" href="CadastroUso.php"> <img src="img/add_user.png" height="30px" width="30px">Cadastrar Usuário</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link opc" href="inativa.php"> <img src="img/inativa_user.png" height="30px" width="30px">Inativar Usuário</a>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
    <div class=" rounded border border-secondary mt-3 col-sm-4 cont-form text-center conteudo">

        <form method="post" action="validaCadastroUsu.php">
            <div>

                <p>
                    <label for="nome_cad"></label>
                    <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="Nome " />
                </p>

                <p>
                    <label for="Telefone_cad"></label>
                    <input id="Telefone_cad" name="Telefone_cad" required="required" type="text" placeholder="Telefone" />
                </p>

                <p>
                    <label for="senha_cad"></label>
                    <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="Senha" />
                </p>

            </div>

            <div class="text-center">
                <input class="btn btn-success" type="submit" value="Cadastrar" />
            </div>
        </form>

        <div>

        <div class="table-responsive">
            <?php
            require_once('00 - BD/bd_conexao.php');
            $sql = " SELECT * FROM usuario";
            $resultado = $con->query($sql);
            ?>
            <!--  Criar tabela para mostrar todos os usuários -->
            <table class="table table-striped">
                <thead>
                    <tr class="bg-success">
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Senha</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($infoUsuario = mysqli_fetch_object($resultado)) { ?>
                        <tr>
                            <th scope="row"> <?php echo $infoUsuario->IdUsu ?> </th>
                            <td><?php echo $infoUsuario->Nome; ?></td>
                            <td><?php echo $infoUsuario->Email; ?></td>
                            <td><?php echo $infoUsuario->Senha; ?></td>
                        </tr>
                    </tbody>
                <?php  }  fecharConexao($con); ?>
            </table>
        </div>

    </div>
        </div>
    <div class="rodape text-center">
        <h2> Rodapé da pagina </h2>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>