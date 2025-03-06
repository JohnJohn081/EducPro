<?php        
        session_start();

        include("../tools/conexao.php");
        $user = $_REQUEST["nameUser"];
        $sobreNomeUser = $_REQUEST["sobrenameUser"];
        $senhaUser = $_REQUEST["senhaUser"];
        $emailUser = $_REQUEST["emailUser"];

        $sql = "INSERT INTO PESSOAS (USUARIO, NAMEUSER, PASSWORDUSER, EMAILUSER) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "ssss", $user, $sobreNomeUser, $senhaUser, $emailUser);
        // CORRIGIR ERRO DE EMAIL DUPLICADO ENTÃO FAZER UM AVISO CASO O 
        //EMAIL DA PESSOA JA EXISTA NO SISTEMA (ISSO PRA USER TAMBEM!!)
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION["user_logado"] = true;
            $_SESSION["usuario"] = $user;
            header("Location: ../home/areaLogada.php");
            exit(); 
        } else {
            echo "Erro nesse codigo podre (cadastro não concluido)";
        }
    ?>