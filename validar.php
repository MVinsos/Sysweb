<?php
session_start();
$sessionDuration = 15 * 60;

// include usado para pegar os dados da conexao com o banco de dados feita pelo conexao.php
include("conexao.php");

//campos para pegar as informações digitadas pelo usuario
$usuarioPost = $_POST["username"];
$senhaPost = $_POST["password"];

//seleciona a tabela login do banco de dados e compara os dados digitados para verificar se o usuario e senha existem
$query = mysqli_query($conexao, "SELECT * FROM login WHERE username = '$usuarioPost' AND password = '$senhaPost'");


//caso as informações entre o usuario e o banco de dados coincidam, o usuario segue para a pagina de cadastro. Tambem temos a duração da sessao definida pelo $sessionduration (15min neste caso)
if (mysqli_num_rows($query) >= 1) {
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $usuarioPost;
    $_SESSION["expire"] = time() + $sessionDuration;
    header("Location: formulario.php");
    exit;
} else { //caso as informações estejam incorretas, o usuario retorna para a tela de login
    header("Location: login.php");
    exit;
}

mysqli_close($conexao);

?>