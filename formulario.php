<?php 
//inclue as informações e comandos que já foram registrados atraves da sessao e conexao, assim verificando se o usuario esta logado e se o sistema esta conectado ao banco de dados
include("sessao.php");
include("conexao.php");


//inicia as variaves limpas para que o sistema não puxe informações  previamente preenchidas atraves do cache do navegador
$id = $nome = $telefone ='';
$isEditing = false;


//verifica se a variavel de edição esta ativa, caso esteja ele puxa as informações do banco de dados e mostra elas ao usuario.
if (isset($_GET['editar'])) {
    $isEditing = true;
    $idEditar = $_GET['editar'];
    $query = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id = '$idEditar'");
    if (mysqli_num_rows($query) == 1) {
        $linha = mysqli_fetch_assoc($query);
        $id = $linha["id"];
        $nome = $linha["nome"];
        $telefone = $linha["telefone"];
    }
} 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova Sistemas - Marcos</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-home"><a href="index.php">Home</a></div>
        <div class="header-login"><a href="login.php">Encerrar Sessão</a></div>
    </header>
    <!-- formulario que abriga os campos nos quais o usuario vai digitar seus dados. Tambem tem a condição de ocultar o id e alterar o botão de envio caso o usuario selecione a opção de edição -->
    <main class="main_formulario">
        <div class="flex-container">
            <div class="form-container">
            <?php if ($isEditing): ?>
                <BR>
                <a href="formulario.php">Incluir novo Cadastro</a>
                <BR><BR>
            <?php endif; ?>
                <h2>Cadastro:</h2>
                <form id="cadastroUsuario" method="post"
                    action="<?php echo $isEditing ? 'atualizar.php' : 'cadastro.php'; ?>">
                    <?php if (!$isEditing): ?>
                        <label for="id">ID:</label>
                        <input type="text" id="id" name="id" maxlength="100" required>
                        <br><br>
                    <?php else: ?>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <?php endif; ?>

                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" maxlength="100" required value="<?php echo $nome; ?>">
                    <br><br>

                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" maxlength="12" required value="<?php echo $telefone; ?>">
                    <br><br>

                    <button class="send_form" type="submit">
                        <?php echo $isEditing ? 'Atualizar' : 'Enviar'; ?>
                    </button>
                </form>
            </div>
<div class="listagemUsuarios">
    <!-- mostra uma lista com as inforções dos usuarios que estão no banco de dados. Caso existam dados ele mostra as opções do CRUD, caso contrario informa que não ha usuarios cadastrados -->
    <h2>Lista de Usuários</h2>
    <ul>
        <?php
        $queryListaUsuarios = mysqli_query($conexao, "SELECT * FROM usuarios");
        if(mysqli_num_rows($queryListaUsuarios) > 0) {
            while ($linhaLista = mysqli_fetch_array($queryListaUsuarios)) {
                $idLista = $linhaLista["id"];
                $nomeLista = utf8_encode($linhaLista["nome"]);
                echo "<li>Cod: $idLista - $nomeLista | <a href='formulario.php?editar=$idLista'>Editar</a> | <a href='deletar.php?id=$idLista'>Deletar</a></li>";
            }
        } else {
            echo "<li>Não há Usuarios cadastrados.</li>";
        }
        ?>
    </ul>
</div>

</div>
</main>
    <!-- script para verificar se o usuario preencheu todos os campo, caso não tenha preenchido é exibida uma mensagem de erro. Tambem encerra a conexão mysqli -->
    <script>
        function validarCadastro() {
            var cadastro = document.getElementById('cadastroUsuario');
            var campos = cadastro.elements;

            for (var i = 0; i < campos.length; i++) {
                if (campos[i].type !== 'submit' && campos[i].type !== 'button' && campos[i].required && campos[i].value.trim() === '') {
                    alert('Por favor, preencha todos os campos antes de enviar o formulário.');
                    return false;
                }
            }

            return true;
        }
    </script>
    <?php mysqli_close($conexao); ?>
</body>
</html>