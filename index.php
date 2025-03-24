<?php 
    
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>AREA DE LOGIN</h1>
        <h4>coloque suas informações abaixo</h4>
    </header>
    <section>
        <form action="loginUser/login.php" method="post">
            <label for="unome">Usuario</label>
            <input type="text" name="nameUser" placeholder="Escreva seu usuario" required="true">
            <label for="usenha">Senha</label>
            <input type="password" name="senhaUser" placeholder="Insira a senha" required="true">
            <input type="submit" value="enviar">
            <a href="loginUser/cadastro.html">Não tem uma conta?</a>
        </form>
    </section>
</body>
</html>