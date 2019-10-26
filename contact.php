<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modern Business - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

  <?php 
    include('menu.php');
    ?>

  <!-- Page Content -->
  <br><br>
  <div class="container">
 

 <div class="row breadcrumb">

  <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home">Home</a>
      </li>
      <li class="breadcrumb-item active">Contact</li>
    </ol>
  </div>
  <!-- Content Row --> 
  <div class="row breadcrumb">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <!-- Embedded Google Map -->
        <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15943.366491092114!2d-44.3089713!3d-2.558341!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1024f6caa9406aaa!2sUniversidade%20Federal%20do%20Maranh%C3%A3o!5e0!3m2!1spt-BR!2sbr!4v1571958822611!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

      </div>
      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Contact Details</h3>
        <p>
          3481 Melrose Place
          <br>Beverly Hills, CA 90210
          <br>
        </p>
        <p>
          <abbr title="Phone">P</abbr>: (123) 456-7890
        </p>
        <p>
          <abbr title="Email">E</abbr>:
          <a href="mailto:name@example.com">name@example.com
          </a>
        </p>
        <p>
          <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
        </p>
      </div>
    </div>
      <div class="row breadcrumb">
        <h3 class="text-center">Envia sua mensagem </h3>
      </div>

      <?php 
   if (isset($_SESSION['situacao3'])) {  
        unset($_SESSION['situacao3']);
                    ?>
                                <script> 
                                 alert("OK: Enviado com sucesso!")
                                </script>
          <?php }?>
   
       
        <center class="" > 
        <div class="col-lg-8 mb-4  ">
        
        <form method="POST" action="banco.php?opc=4">
          <div class="control-group form-group">
            <div class="controls">
              <label>Nome:</label>
              <input type="text" class="form-control" name="nome" id="nome" required data-validation-required-message="Please enter your name.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Telefoner:</label>
              <input type="tel" class="form-control" name="telefone" id="telefone" required data-validation-required-message="Please enter your phone number.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email:</label>
              <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Mensagem:</label>
              <textarea rows="10" cols="100" class="form-control" name="mensagem" id="mensagem" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Enviar"><br><br>
      </div>
    </form>
  </center>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0  text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact form JavaScript -->
  <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

</body>

</html>
