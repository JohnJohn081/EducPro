<?php 
    session_start();
    if (!isset($_SESSION['user_logado']) || $_SESSION['user_logado'] !== true) {
        echo "<script>alert('Erro 69/: Usuário deslogado!'); window.location.href = '../index.php';</script>";
        exit();
    }

    echo "Bem-vindo, " . $_SESSION['usuario'] . "!<br>";
    echo "<a href='../tools/logout.php'>Sair</a>";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AREA PRINCIPAL</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>TESTE AREA LOGADO</h1>
</body>
</html>