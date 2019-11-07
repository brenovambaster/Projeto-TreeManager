<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" type="text/css" href="../css/login12.css">
  <title>Login Controle de Arborização Urbana em Salinas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

  <div class="container" style="opacity:0.9;">

    <a class="links" id="paralogin"></a>

    <div  class="content  animacao mt-5 col-sm-12 col-md-12 col-lg-8 col-xl-8 ">
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
        <form method="post" action="validaLoginAdm.php">
          <?php
          if (isset($_GET['error_login'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Administrador inválido! Por favor, verifique o email e a senha. 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
          }
          ?>


          <h1> <img src="../img/arvoreLogin.png" alt="" height="18%" width="18%">Login ADM</h1>
          <p>
            <label for="email_login"><b>Seu e-mail</b></label>
            <input class="rounded border-primary" id="email_login" name="email_login" required="required" type="email" placeholder="infob.ifnmg@gmail.com" />
          </p>

          <p>
            <label for="senha_login"><b> Senha</b> </label>
            <input class="rounded border-primary" id="senha_login" name="senha_login" required="required" type="password" placeholder="******" />
          </p>

          <p>
            <input type="checkbox" name="manterlogado" id="manterlogado" value="manterlogado" />
            <label for="manterlogado"><b>Manter-me logado</b></label>
          </p>

          <p>
            <input id="logColor" type="submit" value="Logar" style=" font-style: italic;" />
          </p>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>