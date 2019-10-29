
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aluno</title>

</head>

<body id="page-top">

 <?php
      include('menUserAluno.php');
 ?>

     
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="userAluno">Home</a>
          </li>
          <li class="breadcrumb-item active">home</li>
        </ol>

        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Materias</div>
              <div class="card-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Materia</th>
                      <th scope="col">Professor</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
            
              </div>
            </div>
            
          </div>  <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-user-circle"></i>&nbsp;Perfil
              </div>
              <div class="card-body">
                <div class="circle rounded mx-auto d-block">
                 <img src="https://i.stack.imgur.com/atUuf.png">
                </div><br>
                 <center><a class="dropdown-item" href="#"><?php echo"Matricula: $idU";?> <br> <?php echo"Nome: $usuario";?></center> </a>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Materias</div>
              <div class="card-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Materia</th>
                      <th scope="col">Professor</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
            
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-user-circle"></i>&nbsp;Perfil
              </div>
              <div class="card-body">
                <div class="circle rounded mx-auto d-block">
                 <img src="https://i.stack.imgur.com/atUuf.png">
                </div><br>
                 <center><a class="dropdown-item" href="#"><?php echo"Matricula: $idU";?> <br> <?php echo"Nome: $usuario";?></center> </a>
              </div>
            </div>
          </div>

        </div>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

</body>

</html>
