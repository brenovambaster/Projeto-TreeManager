<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <!-- Fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">


    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Favicons -->
    <meta name="theme-color" content="#312b2be1">



    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/new_login.css">
</head>

<body class="text-center">

    <form class="form-signin font1" method="post" action="validaLoginUsuario.php">

        <h1 class="mb-3 text-light">Login <img src="../../img/arvoreLogin.png" alt="" height="25%" width="25%"></h1>
        <!--  Mensagem de erro caso o usuário não é encontrado -->
        <?php
        verGet(); // funvção para ler a url
        ?>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email_login" id="inputEmail" class="form-control col-md-12" placeholder="youremail@gmail.com" required autofocus>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="senha_login" id="inputPassword" class="form-control mt-4" placeholder="******" required>
        </div>
        <div class="form-check form-check-inline  d-flex">
            <input class="form-check-input" type="checkbox" id="manterLogado" value="logado">
            <label class="form-check-label text-light text-left" name="manter_logado" for="manterLogado">Manter-me logado</label>
        </div>
        <div class="checkbox  mt-3 mb-3">
            <label class="d-flex">
                <span class="text-left mr-4"> <a class="nav-link text-light float" href="../index.php">Home</a></span>
                <span class="text-right ml-5"> <a class="nav-link text-light float" href="cadastroUser.php">Cadastre-se</a></span>
            </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-light">&copy; 2020</p>

    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>




<?php
function verGet()
{

    if (isset($_GET['error_login'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Usuário inválido! Por favor, verifique o email e a senha.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
    if (isset($_GET['new_user_success'])) { ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Usuário cadastrado! Agora você já pode fazer login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


    <?php
    }
    if (isset($_GET['email_duplicate'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show text-justify" role="alert">
            Email inválido!Este e-mail já foi cadastrado anteriomente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    }
}
?>