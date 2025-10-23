<?php
session_start();

if(!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h1>Bem-vindo ao Painel, <?php echo $_SESSION['nome']; ?>!</h1>
    <p>Login realizado com sucesso.</p>
    <a href="logout.php">Sair</a>
</body>
</html>