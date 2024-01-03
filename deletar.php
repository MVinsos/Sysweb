<?php 
ob_start();
include("sessao.php");
if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    
    // Inclue a conexão com o banco de dados
    include('conexao.php'); 
    
    // Verifica o id do usuario para a deleção, caso não exista sera exibido uma mensagem de erro. Caso exista então segue para a deleção e informa que foi deletado com sucesso.
    $query = mysqli_query($conexao, "DELETE FROM usuarios WHERE id = $idUsuario");
    
    if ($query) {
        echo "usuario deletado com sucesso.";
    } else {
        echo "Erro ao deletar o usuario: " . mysqli_error($conexao);
    }
} else {
    echo "ID do usuario inválido.";
}

//ao final do processo retorna para a tela do formulario
header("Location:formulario.php");
ob_end_flush();
?>
