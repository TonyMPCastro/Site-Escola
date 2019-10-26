<?php
session_start();
      unset($_SESSION['seguranca']);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
    <form method="POST" action="banco.php?opc=1" class="form-signin" >
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="id" id="inputMat"  class="form-control" placeholder="Seu usuário" required autofocus>
               <label>
                <?php
         if(isset(      
           $_SESSION['situacao'])){
         echo " <label for='inputMat' ><p style='color:red'>Matricula</p></label> ";
         }else{
          ?>
                </label>
       <label for="inputMat">Matricula</label> 
       <?php  } ?>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
      <input type="password" name="senha" id="inputPassword"  class="form-control" placeholder="Sua senha" required>
       <label><?php
          
         if(isset(      
           $_SESSION['situacao'])){
         echo "<label for='inputPassword'><p style='color:red'>Senha</p></label> ";
                unset($_SESSION['situacao']);
         }else{
          ?>
                </label>
       <label for="inputPassword">Senha</label> 
       <?php  } ?>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>

        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
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
