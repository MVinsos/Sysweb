<?php
include('sessao.php');
include('conexao.php');

// pega as informações de cada campo de acordo com o #id(id html e não o id da tabela do banco de dados). Depois inicia a funçao sql para atualizar a tabela usuarios de acordo com os campos respectivos onde o id é compativel com aquele que esta no banco de dados (ex: usuario de id 1 só pode atualizar as informações do id 1 na tabela do banco de dados).
// Caso o id seja inexistente é exibido uma mensagem de carro, caso contrario retorna para o formulario.

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];

$sql = "UPDATE usuarios SET nome = '$nome', telefone = '$telefone' WHERE id = '$id'";
$result = mysqli_query($conexao, $sql);

if (!$result) {
    echo "Erro ao atualizar registro: " . mysqli_error($conexao);
} else {
    header("Location: formulario.php");
    exit;
}

mysqli_close($conexao);
?>