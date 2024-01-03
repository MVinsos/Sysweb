<?php 
include("sessao.php");
include("conexao.php");

//A mesma coisa que o atualizar.php porem aqui é usado o comando INSERT ao inves do UPDATE

$id = $_POST["id"];
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];

$sql = "INSERT INTO usuarios (id, nome, telefone) VALUES ('$id', '$nome', '$telefone')";  
$result = mysqli_query($conexao, $sql);

if (!$result) {
    echo "Dados não inseridos.";
} else {
    header("Location: formulario.php");
    exit;
}

mysqli_close($conexao);
?>