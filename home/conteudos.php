<?php 
     session_start();
     if (!isset($_SESSION['user_logado']) || $_SESSION['user_logado'] !== true) {
         echo "<script>alert('Erro 69/: Você não tem permissão!'); window.location.href = '../index.php';</script>";
         exit();
     }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducPro</title>
    <link rel="stylesheet" href="../css/listaConteudo.css">
    <link rel="stylesheet" href="../css/home.css">

<body>

    <div id="sidebar">
        <div>
            <h2>EducPro</h2>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="conteudos.php">Conteúdos</a></li>
                <li><a href="exercicios.php">Exercícios</a></li>
                <li><a href="ranking.php">Ranking</a></li>
                <li><a href="../tools/logout.php">Sair</a></li>
            </ul>
        </div>
        <div id="user-info">
            <a href="perfil.php">
                <img src="https://cdn-icons-png.flaticon.com/512/552/552721.png" alt="User Profile">
            </a>
            <div id="user-details">
                <p>Nome do Usuário</p>
                <div id="xp-bar">
                    <div id="xp-progress"></div>
                </div>
                <p>Nível: 5</p>
            </div>
        </div>
    </div>

    <div id="content">
        <h1>Conteúdos Disponíveis</h1>
        <div id="conteudos">
            <div class="conteudo">
                <h2>Lógica de Programação</h2>
                <p>Fundamentos essenciais da lógica de programação e exemplos em C.</p>
                <a href="conteudo2.php" class="btn-ver">Acessar</a>
            </div>
            <div class="conteudo">
                <h2>Estruturas de Dados</h2>
                <p>Aprenda sobre arrays, listas, pilhas e filas.</p>
                <a href="conteudo1.php" class="btn-ver">Acessar</a>
            </div>
            <div class="conteudo">
                <h2>Programação Orientada a Objetos</h2>
                <p>Entenda conceitos como classes, objetos e herança.</p>
                <a href="poo.html" class="btn-ver">Acessar</a>
            </div>
            <div class="conteudo">
                <h2>Banco de Dados</h2>
                <p>Fundamentos sobre SQL, NoSQL e modelagem de dados.</p>
                <a href="banco.html" class="btn-ver">Acessar</a>
            </div>
            <div class="conteudo">
                <h2>APIs e Web Services</h2>
                <p>Aprenda a criar e consumir APIs RESTful.</p>
                <a href="apis.html" class="btn-ver">Acessar</a>
            </div>
        </div>
    </div>

</body>
</html>
