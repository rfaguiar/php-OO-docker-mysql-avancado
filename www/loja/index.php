<? 
  require_once("logica-usuario.php"); 
  require_once("mostra-alerta.php");
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Minha loja</title>
      <meta charset="utf-8">
      <link href="css/bootstrap.css" rel="stylesheet" />
      <link href="css/loja.css" rel="stylesheet" />
  </head>

  <body>
    <div class="container">

      <div class="principal">

        <?php mostraAlerta("success"); ?>
        <?php mostraAlerta("danger"); ?>

        <h2>Login</h2>
        <form action="login.php" method="post">
          <table class="table">
              <tr>
                  <td>Email</td>
                  <td><input class="form-control" type="email" name="email"></td>
              </tr>
              <tr>
                  <td>Senha</td>
                  <td><input class="form-control" type="password" name="senha"></td>
              </tr>
              <tr>
                  <td><button type="submit" class="btn btn-primary">Login</button></td>
              </tr>
          </table>
        </form>
      </div>
    </div>
  </body>
</html>