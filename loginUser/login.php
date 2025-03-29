<?php
    include("../tools/conexao.php");
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
        mysqli_stmt_close($stmt);
        
        $sqlInfo = "SELECT xp, level FROM pessoas WHERE usuario = ? OR emailUser = ?";
        $stmtInfo = mysqli_prepare($conn, $sqlInfo);


        mysqli_stmt_bind_param($stmtInfo,"ss", $userOrEmail, $userOrEmail);
        mysqli_stmt_execute($stmtInfo);
        mysqli_stmt_bind_result($stmtInfo, $xp, $level); // aqui ele cata a info depois de logar
        mysqli_stmt_fetch($stmtInfo);

        $_SESSION ["usuario"] = $user;
        $_SESSION ["xp"] = $xp;
        $_SESSION ["nivel"] = $level;
        $_SESSION["user_logado"] = true;
        header("Location: ../home/conteudos.php");
        exit(); 
    } else {
        echo "<script>alert('Erro 32/: Usuario ou senha errado'); window.location.href = '../index.php';</script>";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

?>