<?php 
    include("../../tools/conexao.php");

     session_start();
     if (!isset($_SESSION['user_logado']) || $_SESSION['user_logado'] !== true) {
         echo "<script>alert('Erro 69/: Você não tem permissão!'); window.location.href = '../../index.php';</script>";
         exit();
     }
     $userOrEmail = $_SESSION["usuario"];

     $sqlInfo = "SELECT xp, level FROM pessoas WHERE usuario = ? OR emailUser = ?";
     $stmtInfo = mysqli_prepare($conn, $sqlInfo);


     mysqli_stmt_bind_param($stmtInfo,"ss", $userOrEmail, $userOrEmail);
     mysqli_stmt_execute($stmtInfo);
     mysqli_stmt_bind_result($stmtInfo, $xp, $level); // aqui ele cata a info depois de logar
     mysqli_stmt_fetch($stmtInfo);


     $_SESSION ["xp"] = $xp;
     $_SESSION ["nivel"] = $level;

     mysqli_stmt_close($stmtInfo);
     mysqli_close($conn);
     
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducPro</title>
    <link rel="stylesheet" href="../../css/home.css">
</head>
<body>
    <div id="sidebar">
        <div>
            <h2>EducPro</h2>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="../conteudos.php">Conteúdos</a></li>
                <li><a href="exercicios.php">Exercícios</a></li>
                <li><a href="../ranking/ranking.php">Ranking</a></li>
                <li><a href="../../tools/logout.php">Sair</a></li>
            </ul>
        </div>
        <div id="user-info">
            <a href="perfil.php">
                <img src="https://cdn-icons-png.flaticon.com/512/552/552721.png" alt="User Profile">
            </a>
            <div id="user-details">
                <p><?php echo $_SESSION["usuario"]; ?></p>
                <div id="xp-bar" >
                <div id="xp-progress" style="width: <?php echo $_SESSION['xp']; ?>%;"></div>
                </div>
                <p>Nível: <?php echo $_SESSION['nivel']; ?></p>
            </div>
        </div>
    </div>

    <div id="content">
    <h1>EMBREVE</h1>

    </div>
</body>
</html>