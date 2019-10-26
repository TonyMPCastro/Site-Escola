<?php
define('HOST','localhost');
define('USUARIO','root');
define('SENHA','');
define('DB','biblioteca');
$conexao = mysqli_connect(HOST,USUARIO, SENHA, DB) or die("Erro de Conexão");
 mysqli_set_charset($conexao, "utf8");


?>