<?php
include('seguranca.php');
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/cadastroUsuario.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> Administrador - Gerenciar Usuário </title>
    <!--  ICONS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <div class="top-total">
        <?php include('statusSessionAdm.php'); ?>
        <div class="menu">
            <div class="top-total">
                <div class="title">
                    <h1> Gerenciar Usuário </h1>
                </div>
                <nav class="navbar navbar-expand-lg ">
                    <!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <a class="navbar-brand" href="#">
                            <img src="../img/menu.png" alt="Menu">
                            <a class="navbar-brand" href="#"> <b>Menu</b> </a>
                        </a>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center hovermouse " id="collapsibleNavbar">
                        <ul class="nav nav-pills navbar-nav">
                            <li class="nav-item">

                                <a class="nav-link ap" href="CadastroUso.php"> <img src="../img/add_user.png" height="30px" width="30px">Cadastrar Usuário</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link opc" href="inativa.php"> <img src="../img/inativa_user.png" height="30px" width="30px">Gerenciar Administrador</a>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
    <div class=" rounded border border-secondary mt-3 col-sm-4 cont-form text-center conteudo">
        <!-- ============================VERIFICAR A OPÇÃO PARA EDITAR O USUÁRIO   ==============================================================-->
        <?php
        if ((isset($_GET['alterar']))) {

            require_once('../00 - BD/bd_conexao.php');
            $id = $_GET['id'];
            $sql = "SELECT * FROM  usuario WHERE idUsuario=$id";
            $resultado = $con->query($sql);
            $infoUsuario = mysqli_fetch_object($resultado);

            ?>
            <!-- colocar form de alterar -->



            <h2>Alterar usuário</h2>
            <form method="POST" action="alterar_usuario.php?id=<?php echo $infoUsuario->idUsuario; ?>">
                <div>
                    <p>
                        <label for="IdUsu"></label>
                        <input id="IdUsu" name="IdUsu" required="required" type="text" placeholder="IdUsu" value="<?php echo $infoUsuario->idUsuario; ?>" />
                    </p>
                    <p>
                        <label for="nome_cad"></label>
                        <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="Nome " value="<?php echo $infoUsuario->nome; ?>" />
                    </p>

                    <p>
                        <label for="Telefone_cad"></label>
                        <input id="Telefone_cad" name="telefone_cad" required="required" type="text" placeholder="Telefone" value="<?php echo $infoUsuario->fone; ?>" />
                    </p>

                    <p>
                        <label for="senha_cad"></label>
                        <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="Senha" value="<?php echo $infoUsuario->senha; ?>" />
                    </p>
                    <p>
                        <label for="email"></label>
                        <input id="email" name="email" required="required" type="email" placeholder="email" value="<?php echo $infoUsuario->email; ?>" />
                    </p>

                </div>

                <div class="text-center">
                    <input class="btn btn-success" type="submit" value="Alterar" name="butao" />
                </div>
            </form>




        <?php
        }/*Fechar chave do IF  */ else {
            ?>

            <form method="POST" action="validaCadastroUsu.php">
                <div>

                    <p>
                        <label for="nome_cad"></label>
                        <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="Nome " />
                    </p>

                    <p>
                        <label for="Telefone_cad"></label>
                        <input id="Telefone_cad" name="telefone_cad" required="required" type="text" placeholder="Telefone" />
                    </p>

                    <p>
                        <label for="senha_cad"></label>
                        <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="Senha" />
                    </p>
                    <p>
                        <label for="email"></label>
                        <input id="email" name="email" required="required" type="email" placeholder="email" />
                    </p>

                </div>

                <div class="text-center">
                    <input class="btn btn-success" type="submit" value="Cadastrar" name="butaoCadastro" />
                </div>
            </form>

        <?php //fechar chave do else
        }
        ?>





        <!--  ================================================================================FIM DA VERIFICAÇÃO======================================         -->



    </div>

    <?php
    if (isset($_GET['success'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Usuário foi cadastrado com sucesso!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php
    }
    if (isset($_GET['error_login'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Algo de errado ocorreu :( Por favor, tente novamente!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
    ?>



    <?php
    if (isset($_GET['erroAlterar'])) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Alteração não realizada!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } elseif (isset($_GET['alterado'])) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Alteração realizada com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
    ?>









    <!-- ==========================================TABRLA================================   -->

    <?php
    if (isset($_GET['result']) && $_GET['result'] == "erroExcluir") {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Operação não realizada!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } elseif (isset($_GET['result']) && $_GET['result'] == "excluido") {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Operação realizada com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
    ?>


    <div class=" container  table-responsive">
        <?php
        require_once('../00 - BD/bd_conexao.php');
        $sql = " SELECT * FROM usuario ORDER BY nome ASC"; // SELECIONA OS USUARIOS POR ORDEM ALFABÉTICA CRESCENTE
        $resultado = $con->query($sql);
        ?>
        <!--  Criar tabela para mostrar todos os usuários -->
        <table class="table table-striped table-responsive-md ">
            <thead>
                <tr class="bg-success">
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($infoUsuario = mysqli_fetch_object($resultado)) { ?>
                    <tr>
                        <th scope="row"> <?php echo $infoUsuario->idUsuario ?> </th>
                        <td><?php echo $infoUsuario->nome; ?></td>
                        <td><?php echo $infoUsuario->email; ?></td>
                        <td><?php echo $infoUsuario->fone; ?></td>
                        <td>
                            <a href="CadastroUso.php?alterar&id=<?php echo $infoUsuario->idUsuario; ?>">
                                <i class="far fa-edit text-warning fa-lg" alt="Excluir"></i>
                            </a>
                            <a href="excluir_usuario.php?id=<?php echo $infoUsuario->idUsuario; ?>">
                                <i class="fas fa-trash-alt text-danger fa-lg" alt="Editar"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                fecharConexao($con);

                ?>
            </tbody>


        </table>
    </div>


    <div class="rodape text-center">
        <h2> Rodapé da página </h2>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>