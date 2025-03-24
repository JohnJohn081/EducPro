<?php        
        session_start();

        include("../tools/conexao.php");
        $user = $_REQUEST["nameUser"];
        $sobreNomeUser = $_REQUEST["sobrenameUser"];
        $senhaUser = $_REQUEST["senhaUser"];
        $emailUser = $_REQUEST["emailUser"];

        $sql = "INSERT INTO PESSOAS (USUARIO, NAMEUSER, PASSWORDUSER, EMAILUSER) VALUES (?, ?, ?, ?)";
        $sql_check = "SELECT * FROM pessoas WHERE emailUser = ? OR usuario = ?";

        $stmt_check = mysqli_prepare($conn, $sql_check);
        mysqli_stmt_bind_param($stmt_check, "ss", $emailUser, $user);
        mysqli_stmt_execute($stmt_check);
        $result = mysqli_stmt_get_result($stmt_check);
        
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Erro 77/: Já existe alguem com esse Email/Usuario'); window.location.href = '../index.php';</script>";
        } else {
            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, "ssss", $user, $sobreNomeUser, $senhaUser, $emailUser);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION["user_logado"] = true;
                $_SESSION["usuario"] = $user;
                header("Location: ../home/conteudos.php");
                exit(); 
            } else {
                echo "Erro nesse codigo podre (cadastro não concluido)";
            }
        }
    ?>