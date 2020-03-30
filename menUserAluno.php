<?php
 session_start();
include ('conexao.php');

$idU = isset($_SESSION['idU'])?$_SESSION['idU']:"";
$usuario = isset($_SESSION['usuario'])?$_SESSION['usuario']:"";

if(isset($_SESSION['seguranca'])){
     unset($_SESSION['seguranca']);
     unset($_SESSION['seguranca3']);
} else {
    if (isset($_SESSION['seguranca3'])){    
        unset($_SESSION['seguranca3']);
    } else {  
    unset($_SESSION['seguranca3']);
    header('Location:login');  
            }
    }
    if (isset($_SESSION['idU'])){
        $_SESSION['seguranca3'] = TRUE;
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

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <style type="text/css">

  .circle {
  background-color: #aaa;
  border-radius: 50%;
  width: 130px;
  height: 130px;
  overflow: hidden;
  position: relative;
}

.circle img {
  position: absolute;
  bottom: 0;
  width: 100%;
}
</style>

</head>

<body>



 <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
  
  <div class="input-group">
    <a class="navbar-brand mr-1" href="userAluno">Aluno</a> <br><br>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    
  </div>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="modal" data-target="#logoutModal2" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="badge badge-danger">11</span>
          <i class="fas fa-bell fa-fw"></i>
          
        </a>
      </li>
      <!-- <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-danger">8</span>
                    <i class="fas fa-envelope fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="banco.php?opc=0">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
    
      <li class="nav-item dropdown">
        <a class="nav-link" href="userAluno">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Ensino</span>
        </a>

        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Declarações</h6>
          
             <a class="dropdown-item" href="#"> 
              <i class="far fa-file-alt"></i>
             <span>Declaração de<br>Vinculo</span> </a>
           
             <a class="dropdown-item" href="#"> 
              <i class="far fa-file-alt"></i>
             <span>Atestado de<br>Matrícula</span> </a>
            
               <a class="dropdown-item" href="#"> 
                <i class="far fa-file-alt"></i>
               <span>Historico</span> </a>
            
         
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Outros</h6>

          <a class="dropdown-item" href="#"><i class="far fa-calendar-alt"></i>&nbsp;Horarios</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Boletim</span></a>
      </li>
     
    </ul>

  <div class="modal fade" id="logoutModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Notificações</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><div class="module filtered" id="changelist"><form id="changelist-form" action="" method="post"><input type="hidden" name="csrfmiddlewaretoken" value="wI7h1scniyWZs3KZl3ZOZW8VwtClm4wLbiglWILqOgykaWQt40CFX0kzCDRKJNnN"><div class="pagination"><ul><li class="next disabled"><a style="cursor: default; color: #666">
                    Mostrando 1 
                    
                        Mensagem Recebida
                    
                </a></li></ul></div><div class="actions"><label>Ação: <select name="action" required=""><option value="" selected="">---------</option><option value="marcar_como_lida">Marcar como lida</option><option value="enviar_para_lixeira">Enviar para lixeira</option></select></label><input type="hidden" name="select_across" value="0" class="select-across"><button type="submit" class="button" title="Execute a ação selecionada" name="index" value="0">Aplicar</button><span class="action-counter" data-actions-icnt="1">0 de 1 selecionados</span></div><div class="results"><table id="result_list"><thead><tr><th scope="col" class="action-checkbox-column"><div class="text"><span><input type="checkbox" id="action-toggle"></span></div><div class="clear"></div></th><th scope="col" class="column-get_icone"><div class="text"><span>Ações</span></div><div class="clear"></div></th><th scope="col" class="sortable column-remetente"><div class="text"><a href="?o=2.-4&amp;tab=tab_nao_lidas">Remetente</a></div><div class="clear"></div></th><th scope="col" class="sortable column-assunto"><div class="text"><a href="?o=3.-4&amp;tab=tab_nao_lidas">Assunto</a></div><div class="clear"></div></th><th scope="col" class="sortable column-data_envio sorted descending"><div class="sortoptions"><a class="sortremove" href="?o=&amp;tab=tab_nao_lidas" title="Remover da ordenação"></a><a href="?o=4&amp;tab=tab_nao_lidas" class="toggle descending" title="Alternar ordenção"></a></div><div class="text"><a href="?o=4&amp;tab=tab_nao_lidas">Data envio</a></div><div class="clear"></div></th></tr></thead><tbody><tr class="row1"><td class="action-checkbox"><input type="checkbox" name="_selected_action" value="3194" class="action-select"></td><th class="field-get_icone"><a href="/admin/edu/mensagementrada/3194/change/?_changelist_filters=tab%3Dtab_nao_lidas"></a><a href="/edu/mensagem/3194/" class="icon icon-view " title="Visualizar"><span class="sr-only">Visualizar</span></a></th><td class="field-remetente nowrap">Anderson Gedeon (1645439)</td><td class="field-assunto">BOLETIM DE SERVIÇO INTERNO - BSI 312019</td><td class="field-data_envio nowrap">11/10/2019 14:16</td></tr></tbody></table></div><div class="pagination"><ul><li class="next disabled"><a style="cursor: default; color: #666">
                    Mostrando 1 
                    
                        Mensagem Recebida
                    
                </a></li></ul></div></form></div></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Sair</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
