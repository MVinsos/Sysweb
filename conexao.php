<?php 
// inicio na sessão com o banco de dados

$servidor = "localhost";
$usuarioDB = "id21672769_cadastro";
$senhaDB = "Brad@123";
$dbname = "id21672769_usuario";

$conexao = mysqli_connect($servidor, $usuarioDB, $senhaDB, $dbname);


// condição para caso haja uma falha na conexão, neste caso sera exibida uma mensagem de erro
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
} else {
    //print "Conexão OK!";
}
?>