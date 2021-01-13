<?php
 session_start();

if(isset($_SESSION['segurancaRedf'])){
    
} else {
  header('Location:login'); 
    }  
?>   

<!DOCTYPE html>
<html lang="pt-br">

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
                    ?>
                                <script> 
                                 alert("Senha e confirmação divergentes!")
                                </script>
          <?php }
          ?>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header text-center">Redefinir senha</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Redefinir Senha</h4>
          <p>Digite sua nova senha</p>
        </div>
        <form method="POST" action="banco.php?opc=10">
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="senha" id="senha"  class="form-control" placeholder="Sua senha" required autofocus>
              <label><?php 

              if(isset($_SESSION['situacao3'])){
               echo " <label for='senha' ><p style='color:red'>Digite sua Senha</p></label> ";
               }else{
          ?>
                </label>
       <label for="senha">Digite sua Senha</label> 
       <?php  } ?>

            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="cSenha" id="cSenha"  class="form-control" placeholder="Sua senha" required autofocus>
                            <label><?php 

              if(isset($_SESSION['situacao3'])){
                unset($_SESSION['situacao3']);
               echo " <label for='cSenha' ><p style='color:red'>Confirmação de senha</p></label> ";
               }else{
          ?>
                </label>
       <label for="cSenha">Confirmação de senha</label> 
       <?php  } ?>
            </div>
          </div>
           <input type="submit" class="btn btn btn-success btn-block" value="Enviar"><br><br>
        </form>
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
