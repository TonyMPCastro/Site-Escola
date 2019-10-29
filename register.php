
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

 <title>SB Admin - register</title>

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
            
      $("#matricula").mask("00000000.000000", options)
      
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

  <body class="d-flex flex-column h-100">
     <?php
      include('menuUser.php');
 ?>

 <header>

    <!-- Começa o conteúdo da página -->
    <main role="main" class="flex-shrink-0">
      <div id="content-wrapper">

      <div class="container-fluid">

      <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">HOME</a>
          </li>
          <li class="breadcrumb-item active">Cadastra aluno</li>
        </ol>
       <div class="container ">

        
          <div class="row card"><center>
            <div class="breadcrumb">        
                    <h3>Dados pessoais:</h3>
            </div>
            <div class="col-md-8" style=" ">
              <form method="POST" action="banco.php?opc=3" class="needs-validation" novalidate>
                         <!-- Começa a parte de cadastro -->            
                        
                       <?php
                                if(isset($_SESSION['situacao'])){
                                  ?>
                                <script> 
                                 alert("ERRO: Usuario já Cadastrado!")
                                </script>
          <?php
                                  unset($_SESSION['situacao']);
                                }
                               
                    ?>
                    <?php
                                if(isset($_SESSION['situacao3'])){
                                  ?>
                                <script> 
                                 alert("Cadastro do Usuario  <?php echo $_SESSION['aviso'];?> realizado com sucesso!")
                                </script>
          <?php
                                  unset($_SESSION['aviso']);
                                  unset($_SESSION['situacao3']);
                                }
                               
                    ?>
                    <div class="row">
                          <div class="col-md-6 mb-3">
                                <label for="matricula">Matrícula</label>
                                <input type="text" name="id" class="form-control" id="matricula" readonly="readonly" value="">
                          </div>
                             <div class="col-md-6 mb-3">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite  aqui o cpf." required="" />
                                <div class="invalid-feedback">
                                  É obrigatório inserir um cpf válido.
                                </div>
                         </div>
                  </div>

                  <div class="mb-3">
                                <label for="name">Nome</label>
                                <div class="input-group">
                                <input type="text" name="nome" class="form-control" id="name" placeholder="Digite  aqui o nome." required>
                                <div class="invalid-feedback">
                                    É obrigatório inserir um nome válido.
                                  </div>
                                </div>
                  </div>

                  <div class="row">
                   <div class="col-md-6 mb-3">
                            <label for="curso">Curso</label>
                            <input type="text" name="curso" class="form-control" id="curso" placeholder="Digite  aqui o curso." value="" required>
                            <div class="invalid-feedback">
                              É obrigatório inserir uma matrícula válida.
                            </div>
                  </div>
                  <div class="col-md-6 mb-3">
                            <label for="dataNas">Data de Nascimento</label>
                            <input type="text" name="dataNas" class="form-control" id="dataNas" placeholder="DD/MM/AAAA" value="" required>
                            <div class="invalid-feedback">
                              É obrigatório inserir uma data de nascimento.
                            </div>
                  </div>
                </div>
                        
                <div class="row">
                <div class="col-md-6 mb-3">
                            <label for="telefone">Telefone <span class="text-muted">(Opcional)</span></label>
                            <input type="tel" name="telefone" class="form-control" id="telefone" placeholder="Digite  aqui o telefone." required>
                             <div class="invalid-feedback">
                              É obrigatório inserir um telefone.
                            </div>
                </div>
                <div class="col-md-6 mb-3">
                            <label for="email">Email <span class="text-muted">(Opcional)</span></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Digite  aqui o email." required>
                             <div class="invalid-feedback">
                              É obrigatório inserir um email.
                            </div>
               </div>
              </div>
                         <br>
                         <br>
        <div class="py-5 text-center corC">
           <h3>Endereço:</h3>
         </div>
                         <br>
                         <br>
              <div class="mb-3">
                          <label for="logradouro">Logradouro</label>
                          <input type="text" name="logradouro" class="form-control" id="logradouro" placeholder="Digite  aqui o logradouro." required>
                          <div class="invalid-feedback">
                            Por favor, insira seu endereço.
                          </div>
              </div>
              <div class="row">
                <div class="col-9 mb-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" class="form-control" id="matricula" placeholder="Digite  aqui o bairro." value="" required>
                            <div class="invalid-feedback">
                              É obrigatório inserir uma bairro válida.
                            </div>
                </div>
                <div class="col-md-3 mb-3">
                            <label for="nCasa">Número</label>
                            <input type="text" name="NCasa" class="form-control" id="nCasa" placeholder="Numero da casa" required>
                </div>
             </div>

            <div class="row">
                 <div class="col-md-4 mb-3">
                            <label for="estado">Estado</label>
                            <select name="estado" class="custom-select d-block w-100" id="estado" required>
                              <option>Escolha o estado...</option>
                              <option value="Maranhão">Maranhão</option>
                            </select>
                            <div class="invalid-feedback">
                              Por favor, insira um estado válido.
                            </div>
              </div>
              <div class="col-md-5 mb-3">
                            <label for="cidade">Cidade</label>
                            <select name="cidade" class="custom-select d-block w-100" id="cidade" required>
                              <option>Escolha a cidade...</option>
                              <option value="Viana">Viana</option>
                              <option value="Matinha">Matinha</option>
                              <option value="Cajari">Cajari</option>
                              <option value="Penalva">Penalva</option>
                            </select>
                            <div class="invalid-feedback">
                              Por favor, escolha uma cidade válida.
                            </div>
              </div>
           
             <div class="col-md-3 mb-3">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" id="cep" class="form-control" placeholder="Digite  aqui o cep." required>
                            <div class="invalid-feedback">
                              É obrigatório inserir um CEP.
                            </div>
             </div>
          </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Salvar</button>
                        <br>
                        <br>
              </form>
            </div></center>
          </div>
    </div>  
  </div>
</div>

 </header>
   <footer id="nav-link" class="footer mt-auto py-3">
     
      <div id="nav-link" class="container">
          <center> <span  class="text-muted">&copy 2019. Todos os direitos reservados.</span></center>
      </div>
         
    </footer>
    </main>
</header>
        
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
  
</body></html>