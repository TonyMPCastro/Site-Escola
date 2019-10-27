<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - redefinirSenha</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
    <?php 
    session_start();
   if (isset($_SESSION['situacao3'])) {  
        unset($_SESSION['situacao3']);
                    ?>
                                <script> 
                                 alert("OK: Enviado com sucesso!")
                                </script>
          <?php }?>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header text-center">Redefinir senha</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Esqueceu sua senha?</h4>
          <p>Digite seu CPF e enviaremos instruções sobre como redefinir sua senha.</p>
        </div>
        <form method="POST" action="banco.php?opc=3">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="cpf" id="cpf"  class="form-control" placeholder="Seu CPF" required autofocus>
              <label for="cpf">Digite seu CPF</label>
            </div>
          </div>
           <input type="submit" class="btn btn btn-success btn-block" value="Enviar"><br><br>
        </form>
          <div class="text-center">
          <a class="btn btn-primary btn-block" href="login">Login</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
