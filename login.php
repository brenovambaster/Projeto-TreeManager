<!doctype html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" type="text/css" href="css/Login.css">
  <title>Login Controle de Arborização Urbana em Salinas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
</head>

<body id="bodyteste">

  <div class="container   ">

    <a class="links" id="paralogin"></a>

    <div class="content mt-5 col-sm-12 col-md-12 col-lg-8 col-xl-8">
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
        <form method="post" action="">
          <h1> <img src="img/arvoreLogin.png" alt="" height="18%" width="18%">Login</h1>
          <p>
            <label for="email_login"><b>Seu e-mail</b></label>
            <input id="email_login" name="email_login" required="required" type="text" placeholder="infob.ifnmg@gmail.com" />
          </p>

          <p>
            <label for="senha_login"><b> Senha</b> </label>
            <input id="senha_login" name="senha_login" required="required" type="password" placeholder="******" />
          </p>

          <p>
            <input type="checkbox" name="manterlogado" id="manterlogado" value="" />
            <label for="manterlogado"><b>Manter-me logado</b></label>
          </p>

          <p>
            <input type="submit" value="Logar"  style=" font-style: italic;"/>
          </p>

        </form>
      </div>

      <!--FORMULÁRIO DE CADASTRO
      <div id="cadastro">
        <form method="post" action=""> 
          <h1>Cadastro</h1> 
          
          <p> 
            <label for="nome_cad">Seu nome</label>
            <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="Seu Nome " />
          </p>
          
          <p> 
            <label for="email_cad">Seu e-mail</label>
            <input id="email_cad" name="email_cad" required="required" type="email" placeholder="infob.ifnmg@gmail.com"/> 
          </p>
          
          <p> 
            <label for="senha_cad">Sua senha</label>
            <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="1234"/>
          </p>
          
          <p> 
            <input type="submit" value="Cadastrar"/> 
          </p>
          
          <p class="link">  
            Já tem conta?
            <a href="#paralogin"> Ir para Login </a>
          </p>
        </form>-->
    </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>