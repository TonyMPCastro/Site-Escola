<?php
session_start();
      unset($_SESSION['seguranca']);
      unset($_SESSION['seguranca2']);
      unset($_SESSION['seguranca3']);
      unset($_SESSION['segurancaRedf']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <script src="js/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-3.3.1.slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

         <!-- js para mascara -->
<script type="text/javascript" src="js/jquery.mask.min.js"></script>  
    <script type="text/javascript">
    $(document).ready(function(){
      $("#cpf").mask("000.000.000-00")
      $("#cnpj").mask("00.000.000/0000-00")
      $("#telefone").mask("(00) 0000-0000")
      $("#cep").mask("00.000-000")
      $("#dataNas").mask("00/00/0000")
      
      $("#rg").mask("999.999.999-W", {
        translation: {
          'W': {
            pattern: /[X0-9]/
          }
        },
        reverse: true
      })
      
      var options = {
        translation: {
          'A': {pattern: /[A-Z]/},
        }
      }
            
      $("#matricula").mask("00000AAA.AAA0000", options)
      
      $("#celular").mask("(00) 0000-00009")
      
      $("#celular").blur(function(event){
        if ($(this).val().length == 15){
          $("#celular").mask("(00) 00000-0009")
        }else{
          $("#celular").mask("(00) 0000-00009")
        }
      })
    })
    </script>
  </head>
  <!-- Estilos customizados para esse template -->
    <link href="vendor/bootstrap/css/form-validation.css" rel="stylesheet">

  <body> 
 <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a href="home"><img  class="navbar-brand" width="130px" height="50px"  src="img/logo.png"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="sobre">Sobre</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="services">Serviços</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact">Contato</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Portfolio
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="portfolio-1-col">1 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-2-col">2 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-3-col">3 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-4-col">4 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-item">Single Portfolio Item</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Blog
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="blog-home-1">Blog Home 1</a>
              <a class="dropdown-item" href="blog-home-2">Blog Home 2</a>
              <a class="dropdown-item" href="blog-post">Blog Post</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Other Pages
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="full-width">Full Width Page</a>
              <a class="dropdown-item" href="sidebar">Sidebar Page</a>
              <a class="dropdown-item" href="faq">FAQ</a>
              <a class="dropdown-item" href="404">404</a>
              <a class="dropdown-item" href="pricing">Pricing Table</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="login" class="btn btn-primary">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br><br><br><br><br>
  
  <?php 
 
   if (isset($_SESSION['situacao3'])) {  
        unset($_SESSION['situacao3']);
                    ?>
                                <script> 
                                 alert("OK: Enviado com sucesso!")
                                </script>
          <?php }?>

  <div class="container">
    <div class="card card-login mx-auto mt-5 bg-dark">
     <center> <div class="card-header" style='color:white'>Login</div></center>
      <div class="card-body">
    <form method="POST" action="banco.php?opc=1" class="form-signin" >
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="matricula" id="matricula"  class="form-control" placeholder="Seu usuário" required autofocus>
               <label>
                <?php
         if(isset(      
           $_SESSION['situacao'])){
         echo " <label for='matricula' ><p style='color:red'>Matricula</p></label> ";
         }else{
          ?>
                </label>
       <label for="matricula">Matricula</label> 
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
              <label style='color:white'>
                <input type="checkbox"  value="remember-me" >
                Lembrar Senha
              </label>
            </div>
          </div>
          <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>

        </form>
        <br>
        <div class="text-center">
          <a class="d-block small" href="redefinirSenha">Esqueceu sua senha?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script>
      // Exemplo de JavaScript para desativar o envio do formulário, se tiver algum campo inválido.
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Selecione todos os campos que nós queremos aplicar estilos Bootstrap de validação customizados.
          var forms = document.getElementsByClassName('needs-validation');

          // Faz um loop neles e previne envio
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
      <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
