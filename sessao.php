<?php
session_start();

// Verifica se o usuário está logado e se a sessão não expirou
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["expire"] <= time()) {
    header("Location: login.php");
    exit;
}

// Atualiza o tempo de expiração da sessão
$sessionDuration = 15 * 60; // 15 minutos
$_SESSION["expire"] = time() + $sessionDuration;
?>
