<?php
    include("conexao.php");
    session_start();

    $userOrEmail = $_REQUEST["nameUser"];
    $password = $_REQUEST["senhaUser"];

    $sql = "SELECT usuario FROM pessoas WHERE (usuario = ? OR emailUser = ?) AND passwordUser = ?";

    $stmt = mysqli_prepare($conn, $sql); // aqui ele prepara então add a conexão do conn e o sql

    mysqli_stmt_bind_param($stmt, "sss", $userOrEmail, $userOrEmail, $password);
    mysqli_stmt_execute($stmt); // aqui ele executa o comando
    mysqli_stmt_store_result($stmt); // se for pra procurar login ou usuario coloca isso daqui

    // e usa isso daqui pra verificar se foi true ou false a procura do negocio
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $user); // aqui ele cata o user depois de logar
        mysqli_stmt_fetch($stmt); // Pega o valor do usuário
        $_SESSION ["usuario"] = $user;
        $_SESSION["user_logado"] = true;
        header("Location: areaLogada.php");
        exit(); 
    } else {
        echo "<script>alert('Erro 32/: Usuario ou senha errado'); window.location.href = 'index.php';</script>";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

?>