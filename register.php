
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8"> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

 <title>SB Admin - register</title>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.estado);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
  

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
                            <label for="telefone">Telefone</label>
                            <input type="tel" name="telefone" class="form-control" id="telefone" placeholder="Digite  aqui o telefone." required>
                             <div class="invalid-feedback">
                              É obrigatório inserir um telefone.
                            </div>
                </div>
                <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
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
                           <div class="row">
                <div class="col-md-3 mb-3">
                            <label for="cep">Cep
                            <input type="text" name="cep" class="form-control" id="cep"
                             maxlength="8" required onblur="pesquisacep(this.value);" /></label>
                            <div class="invalid-feedback">
                              É obrigatório inserir um CEP.
                            </div>
                </div>
                <div class="col-9 mb-3">
                            <label for="rua">Logradouro</label>
                            <input type="text" name="rua" class="form-control" id="rua" value="" required>
                            <div class="invalid-feedback">
                              É obrigatório inserir um logradouro.
                            </div>
                </div>
                
             </div>
              
              <div class="row">
                <div class="col-9 mb-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" class="form-control" id="bairro" value="" required>
                            <div class="invalid-feedback">
                              É obrigatório inserir uma bairro válida.
                            </div>
                </div>
                <div class="col-md-3 mb-3">
                            <label for="nCasa">Número</label>
                            <input type="text" name="NCasa" class="form-control" id="nCasa" required>
                </div>
             </div>

            <div class="row">
                 <div class="col-md-4 mb-3">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" class="form-control" id="estado" value="" required>
                            <div class="invalid-feedback">
                              Por favor, insira um estado válido.
                            </div>
              </div>
              <div class="col-md-5 mb-3">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" class="form-control" id="cidade" value="" required>
                            <div class="invalid-feedback">
                              Por favor, escolha uma cidade válida.
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
     <?php
      include('fooder.php');
 ?>

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