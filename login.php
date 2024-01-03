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
        <div class="header-login"><a href="login.php">Área do Usuário</a></div>
    </header>

       <!-- parte principal da pagina com os campos para que o usuario digite seu usuario e senha, mais abaixo o botao de enviar que inicia o processo de confirmação atraves do validar.php -->
    <main>
        <div class="login-container">
            <div class="login-title">
                <h2>Login</h2>
            </div>
            <div class="acesso">
                <form action="validar.php" method="POST">
                    <label for="username">Usuário:</label>
                    <input type="text" id="username" name="username" maxlength="20"  required>
                    <br><br>
                    <label class="password" for="password">Senha:</label>
                    <input type="password" id="password" name="password" maxlength="20" required>
                        <br><br>
                    <button class="send_form" type="submit">Acessar</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>