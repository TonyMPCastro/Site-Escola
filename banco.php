<?php
 session_start();

include ('conexao.php');

function my_Sql_regcase($str){

    $res = "";

    $chars = str_split($str);
    foreach($chars as $char){
        if(preg_match("/[A-Za-z]/", $char)){
             $res .= "[".mb_strtoupper($char, 'UTF-8').mb_strtolower($char, 'UTF-8')."]";
        }else{
            $res .= $char;
        }
     }

     return $res;
}


function anti_injection($sql)
    {
         //echo $sql;
         $array_str = array("SLEEP","DBMS_LOCK.SLEEP", "waitfor delay","DBMS_LOCK.","DBMS_LOCK");
         #$array_str = array("");
         
         $aux = $sql;
         for($i=0;$i<count($array_str); $i++)
         {
            $sql = str_ireplace($array_str[$i], "", $aux);
            //echo $sql."<br>";
         }
        
        // remove palavras que contenham sintaxe sql
        $sql= preg_replace(my_Sql_regcase("/(from|select|or|insert|delete|where|drop table|show tables)/"),'', $sql);

        $sql = trim($sql);//limpa espaços vazio
        $sql = strip_tags($sql);//tira tags html e php
        $sql = addslashes($sql);//Adiciona barras invertidas a uma string
        return $sql;
    }


$id = isset($_POST["matricula"])?$_POST["matricula"]:"";
$id = anti_injection($id);
$id2 = isset($_POST["btn"])?$_POST["btn"]:"";
$nome = isset($_POST["nome"])?$_POST["nome"]:"";
$cpf = isset($_POST["cpf"])?$_POST["cpf"]:"";
$dataNas = isset($_POST["dataNas"])?$_POST["dataNas"]:"";
$telefone = isset($_POST["telefone"])?$_POST["telefone"]:"";
$email = isset($_POST["email"])?$_POST["email"]:"";
$logradouro = isset($_POST["logradouro"])?$_POST["logradouro"]:"";
$NCasa = isset($_POST["NCasa"])?$_POST["NCasa"]:"";
$bairro = isset($_POST["bairro"])?$_POST["bairro"]:"";
$cidade = isset($_POST["cidade"])?$_POST["cidade"]:"";
$estado = isset($_POST["estado"])?$_POST["estado"]:"";
$cep = isset($_POST["cep"])?$_POST["cep"]:"";
$senha = isset($_POST["senha"])?$_POST["senha"]:"";
$senha = anti_injection($senha);
$cSenha = isset($_POST["cSenha"])?$_POST["cSenha"]:"";
$cSenha = anti_injection($cSenha);
$mensagem = isset($_POST["mensagem"])?$_POST["mensagem"]:"";
        
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('YmHs');
    
    $codigo = "$date";



$opc = $_GET["opc"]?$_GET["opc"]:"";

switch ($opc){
    case 0: sair();
        break;
    case 1: logar($id, $senha);
        break;
    case 2: 
    if($senha == $cSenha){
        cadastarAdm($id,$nome,$cpf,$senha);
    }else{
        $_SESSION['situacaoS']=true;
        $_SESSION['seguranca'] = true;
        header('Location:cadAdm.php');
    }
        break;
    
    case 3: RedSenha($cpf);
        break;
     case 4: email($email,$mensagem,$nome,$telefone);
        break;
     case 5: excluirUsuario($id2);
        break;
     case 6: BuscarU($id2);
        break;
     case 7: editarUsuario($id,$id2,$nome,$cpf,$dataNas,$curso,$telefone,$email,$logradouro,$bairro,$NCasa,$cidade,$estado,$cep);
        break;
     case 8: BuscarA($id2);cadastarUsuario($id,$nome,$cpf,$dataNas,$curso,$telefone,$email,$logradouro,$bairro,$NCasa,$cidade,$estado,$cep);
        break;
     case 9: excluirAdms($id2);
        break;
     case 10: 
     if($senha == $cSenha){
        redefSenha($senha);
    }else{
        $_SESSION['situacao3'] = true;
        header('Location: redSenha');
    }
        break;

    case 11: pdf();
        break;
    
    default:echo 'Opção Incorreta';
}

    
    function logar($id,$senha){
        global $conexao;
        $query = "select * from adm where matricula='$id' and senha='$senha'";
        $resultado = mysqli_query($conexao, $query) or die("Erro de Login");
        $usuario = mysqli_fetch_array($resultado);
        $linha = mysqli_num_rows($resultado);
        if($linha == 1){
             $_SESSION['seguranca'] = true;
             
             $_SESSION['idU'] = $usuario['matricula'];
             $idU = $usuario['cpf'];
             $senhaB = $usuario['senha'];
             $_SESSION['usuario'] = $usuario['nome'];
             $tipo = $usuario['tipo'];
            $_SESSION['cpf'] = $usuario['cpf'];

          

             if ($idU == $senha) {
                header('Location: redSenha');
             }elseif ($tipo == 1) {
               
                $_SESSION['seguranca2'] = true; 
                header('Location: user');
             }else{
                
                $_SESSION['seguranca3'] = true; 
                header('Location: userAluno');

             }
             
            
        } else {
            $_SESSION['situacao'] = true;
            header('Location: login');
        }
}  


    function email($email,$mensagem,$nome,$telefone){

        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "cethec@ct.com.br");
        $subject = "Mensagem de contato de $nome";
        $to = new SendGrid\Email(null, "$email");
        $content = new SendGrid\Content("text/html", "Olá Cethec, <br><br>Nova mensagem de contato de $nome:<br>Mensagem: $mensagem<br><br>Nome: $nome<br>Email: $email<br>Telefone: $telefone <br>");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);  
        $_SESSION['situacao3'] = true;  
        header('Location: contact');    
    }

    function RedSenha($cpf){
            global $conexao;
        require 'vendor/autoload.php';


        $query = "select * from adm where cpf='$cpf'";
        $resultado = mysqli_query($conexao, $query) or die("Erro de Login");
        $usuario = mysqli_fetch_array($resultado);
        $linha = mysqli_num_rows($resultado);
             $idU = $usuario['matricula'];
             $usuario1 = $usuario['nome'];
             $email = $usuario['email'];

        if($linha == 1){
        $query1 = "update adm set senha='$cpf' where cpf='$cpf'";
        $resultado = mysqli_query($conexao, $query1) or die("Erro !");

        $from = new SendGrid\Email(null, "cethec@ct.com.br");
        $subject = "Redefinir Senha";
        $to = new SendGrid\Email(null, "$email");
        $content = new SendGrid\Content("text/html", "Olá $usuario1, <br><br>Novos dados:<br>Usuario: $idU<br>Senha: $cpf<br>");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);   
        unset($_SESSION['seguranca']);
        $_SESSION['situacao3'] = true;  
        header('Location: login'); 

        }  
    }

     function redefSenha($senha){
            global $conexao;
        require 'vendor/autoload.php';

        $cpf = isset($_SESSION['cpf'])?$_SESSION['cpf']:"";

        echo "$cpf";

        $query = "select * from adm where cpf='$cpf'";
        $resultado = mysqli_query($conexao, $query) or die("Erro de Login");
        $usuario = mysqli_fetch_array($resultado);
        $linha = mysqli_num_rows($resultado);
             $idU = $usuario['matricula'];
             $usuario1 = $usuario['nome'];
             $email = $usuario['email'];

             if($linha == 1){

        $query1 = "update adm set senha='$senha' where cpf='$cpf'";
        $resultado = mysqli_query($conexao, $query1) or die("Erro !");

        $from = new SendGrid\Email(null, "cethec@ct.com.br");
        $subject = "Senha redefinida";
        $to = new SendGrid\Email(null, "$email");
        $content = new SendGrid\Content("text/html", "Olá $usuario1, <br><br>Novos dados:<br>Usuario: $idU<br>Senha: $senha<br>http://localhost/Site-Escola/login");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);   
        unset($_SESSION['seguranca']);
        $_SESSION['situacao3'] = true;  
        header('Location: login'); 

        }  
    }

    
// //     function cadastarAdm($id,$nome,$cpf,$senha){
// //        global $conexao;
// //     //======Verificar se já existe cadastrado===============//
// //     $query1 = "Select * from adm where matricula='$id'";
// //     $resultado1 = mysqli_query($conexao,$query1);
// //     $linha = mysqli_num_rows($resultado1);
// // 	if ($linha >=1) {
// // 		$_SESSION['situacao']=true;
// //                 $_SESSION['seguranca'] = true;
// // 		header('Location:cadAdm.php');
// // 	}else{
// // 		//======Comando para cadastrar no banco de dados=========//
// // 		$query = "insert into adm (matricula, nome,cpf, senha,dataHora) VALUES ('$id', '$nome','$cpf', '$senha',NOW())";
// // 		$resultado = mysqli_query($conexao, $query) or die("Erro no cadastro meu chapa!");
// // 		$_SESSION['seguranca']=true;
// //                 $_SESSION['situacao3']=true;
// //                 $_SESSION['aviso']=$id;
// // 		header('Location: cadAdm.php');
// // 	}
// //     }
    
// //     function cadastarUsuario($id,$nome,$cpf,$dataNas,$curso,$telefone,$email,$logradouro,$bairro,$NCasa,$cidade,$estado,$cep){
// //        global $conexao;
// //     //======Verificar se já existe cadastrado===============//
// //     $query1 = "Select * from usuarios where matricula='$id'";
// //     $resultado1 = mysqli_query($conexao,$query1);
// //     $linha = mysqli_num_rows($resultado1);
// // 	if ($linha >=1) {
// // 		$_SESSION['situacao']=true;
// //                 $_SESSION['seguranca'] = true;
// 		header('Location:cadUsuario.php');
// 	}else{
// 		//======Comando para cadastrar no banco de dados=========//
// 		$query = "insert into usuarios(matricula,nome,cpf,dataNas,telefone,email,curso,logradouro,NCasa,bairro,cidade,estado,cep,dataHora) VALUES ('$id','$nome','$cpf','$dataNas','$telefone','$email','$curso','$logradouro','$NCasa','$bairro','$cidade','$estado','$cep',NOW())";
// 		$resultado = mysqli_query($conexao, $query) or die("Erro no cadastro meu chapa!");
// 		$_SESSION['seguranca']=true;
//                 $_SESSION['situacao3']=true;
//             $_SESSION['aviso']=$id;
// 		header('Location: cadUsuario.php');
// 	}
//     }
    
    function sair(){
        session_destroy();
        header('Location: login');
    }


//     function excluirUsuario($id) {
//         global $conexao;
//          $_SESSION['seguranca'] = true;
//     $query = "delete from usuarios where matricula='$id'";
//     $resultado = mysqli_query($conexao, $query);
//     header('Location: usuarios.php'); 
//     }

//     function excluirAdms($id) {
//         global $conexao;
//          $_SESSION['seguranca'] = true;
//     $query = "delete from adm where matricula='$id'";
//     $resultado = mysqli_query($conexao, $query);
//     header('Location: adms.php'); 
//     }


//      function excluirEmp($id) {
//         global $conexao;
//          $_SESSION['seguranca'] = true;
//     $query = "update emprestimoslivro set estadoCad='1',dataHoraEnt=NOW() where id='$id'";
//     $resultado = mysqli_query($conexao, $query);
//     header('Location: empEmAndamento.php'); 
//     }
    
//     function BuscarU($id2){
//          global $conexao;
//        $query = "select * from usuarios where matricula='$id2'";
//        $resultado = mysqli_query($conexao, $query);
//        $linha = mysqli_fetch_assoc($resultado);
//         $_SESSION['id'] = $id2;
//         $_SESSION['nome'] = $linha['nome'];  
//         $_SESSION['cpf'] = $linha['cpf'];
//         $_SESSION['dataNas'] = $linha['dataNas'];
//         $_SESSION['telefone'] = $linha['telefone'];
//         $_SESSION['email'] = $linha['email'];
//         $_SESSION['curso'] = $linha['curso'];
//         $_SESSION['logradouro'] = $linha['logradouro'];
//         $_SESSION['NCasa'] = $linha['NCasa'];
//         $_SESSION['bairro'] = $linha['bairro'];
//         $_SESSION['cidade'] = $linha['cidade'];
//         $_SESSION['estado'] = $linha['estado'];
//         $_SESSION['cep'] = $linha['cep'];
//         $_SESSION['edt'] = false;
//         header('Location: editarUsuario.php');
//     }

//     function BuscarA($id2){
//          global $conexao;
//        $query = "select * from adm where matricula='$id2'";
//        $resultado = mysqli_query($conexao, $query);
//        $linha = mysqli_fetch_assoc($resultado);
//         $_SESSION['id'] = $id2;
//         $_SESSION['nome'] = $linha['nome'];  
//         $_SESSION['cpf'] = $linha['cpf'];
//         $_SESSION['edt'] = false;
//         header('Location: editarAdms.php');
//     } 


//      function enviarEmail($id2){
//          global $conexao;
        
//         $query1 = "Select * from usuarios where matricula='$id2'";
//         $resultado1 = mysqli_query($conexao,$query1);
//         $linha = mysqli_num_rows($resultado1);

//         $_SESSION['nome'] = $linha['nome'];  

//         $_SESSION['situacao4'] = true;

       
//         header('Location: empEmAndamento.php');
//     }


//     function editarUsuario($id,$id2,$nome,$cpf,$dataNas,$curso,$telefone,$email,$logradouro,$bairro,$NCasa,$cidade,$estado,$cep){
//     global $conexao;
//         unset($_SESSION['nome']);
//         unset($_SESSION['cpf']);
//         unset($_SESSION['dataNas']);
//         unset($_SESSION['telefone']);
//         unset($_SESSION['email']);
//         unset($_SESSION['curso']);
//         unset($_SESSION['logradouro']);
//         unset($_SESSION['NCasa']);
//         unset($_SESSION['bairro']);
//         unset($_SESSION['cidade']);
//         unset($_SESSION['estado']);
//         unset($_SESSION['cep']); 
//     //======Verificar se esse existe usuario===============//
//     $query1 = "Select * from usuarios where matricula='$id2'";
//     $resultado1 = mysqli_query($conexao,$query1);
//     $linha = mysqli_num_rows($resultado1);
//     if ($linha >=1) {
//         $query = "update usuarios set matricula='$id',nome='$nome',cpf='$cpf',dataNas='$dataNas',telefone='$telefone',email='$email',curso='$curso',logradouro='$logradouro',NCasa='$NCasa',bairro='$bairro',cidade='$cidade',estado='$estado',cep='$cep',dataHoraA=NOW() where matricula='$id2'";
//        $resultado = mysqli_query($conexao, $query);
//                  $_SESSION['seguranca']=true;
//                 $_SESSION['situacao3']=true;
//                 unset($_SESSION['id']);
//          header('Location: usuarios.php'); 
//     }else{

//         $_SESSION['situacao']=true;
//                 $_SESSION['seguranca'] = true;
//                 unset($_SESSION['id']);
//         header('Location:editarUsuario.php');
    
//     }
//  }

//  function editarAdm($id,$id2,$nome,$cpf,$senha){
//        global $conexao;
//     //======Verificar se já existe cadastrado===============//
//     $query1 = "Select * from adm where matricula='$id2'";
//     $resultado1 = mysqli_query($conexao,$query1);
//     $linha = mysqli_num_rows($resultado1);
//     if ($linha >= 1) {
//          //======Comando para cadastrar no banco de dados=========//
//         $query1 = "update adm set matricula='$id',nome='$nome',cpf='$cpf',senha='$senha',dataHoraA=NOW() where matricula='$id2'";
//         $resultado = mysqli_query($conexao, $query1) or die("Erro no cadastro meu chapa!");
//         $_SESSION['seguranca']=true;
//         $_SESSION['situacao3']=true;
//         echo $id2;
//        header('Location: adms.php');
//     }else{

//          $_SESSION['situacao']=true;
//                 $_SESSION['seguranca'] = true;
//         header('Location:adms.php');
       
//     }
//     }


//     function cadastrarLivro($codigo,$isbn,$exemplar,$tipo,$titulo,$autor,$editora,$localizacao,$genero,$curso,$anoP,$volume){
//         global $conexao;
//         $query = "select * from livros where isbn='$isbn'";
//        $resultado = mysqli_query($conexao, $query);
//        $linha = mysqli_fetch_assoc($resultado);
//        if ($linha >=1) {
//         $_SESSION['situacao']=true;
//                 $_SESSION['seguranca'] = true;
//         header('Location:cadLivro.php');
//     }else{
//         $query =  "insert into livros(id, isbn, Nexemplar, tipo, titulo, autor, editora, localizacao, genero, curso, anoP, volume, dataHora) VALUES ('$codigo','$isbn','$exemplar','$tipo','$titulo','$autor','$editora','$localizacao','$genero','$curso','$anoP','$volume',NOW())";
//         $resultado = mysqli_query($conexao, $query);
//         $_SESSION['seguranca']=true;
//         $_SESSION['codigoL']= $codigo;
//                 $_SESSION['situacao3']=true;      
//         header('Location: cadLivro.php');
//     }
// }


//     function  excluirLivro($id2){
//          global $conexao;
//          $_SESSION['seguranca'] = true;
//     $query = "delete from livros where id='$id2'";
//     $resultado = mysqli_query($conexao, $query);
//     header('Location: livros.php');
// }

//     function cadastrarEmp($id2,$dataNas){
//         global $conexao;
//         $idEmp = $_SESSION['idEmp'];
//         $codigoEmp = $_SESSION['codigoEmp'];
//         $query1 = "select * from emprestimoslivro where idUsuario='$idEmp' and idLivro='$codigoEmp' and dataHoraEnt='0000-00-00' and estadoCad='0' ";
//             $resultado1 = mysqli_query($conexao,$query1);
//             $linha = mysqli_num_rows($resultado1);
//             if ($linha >=1) {
//                      $_SESSION['situacaoF']=true;
//                     header('Location: empEmAndamento.php');
//                }else{
//         $query2 = "insert into emprestimoslivro(idUsuario,idAdm,idLivro,dataHora,dataHoraDev,estadoCad) VALUES ('$idEmp','$id2','$codigoEmp',NOW(),'$dataNas','0')";
//     $resultado = mysqli_query($conexao, $query2);
       
//      $_SESSION['situacaoS']=true;
//       header('Location: empEmAndamento.php');
//   }
//     }
//  function pdf(){
//     header('Location: empPdf.php');
// }
        ?>
 
    