<?php 
    include("../tools/conexao.php");

     session_start();
     if (!isset($_SESSION['user_logado']) || $_SESSION['user_logado'] !== true) {
         echo "<script>alert('Erro 69/: Você não tem permissão!'); window.location.href = '../index.php';</script>";
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
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <div id="sidebar">
        <div>
            <h2>EducPro</h2>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="conteudos.php">Conteúdos</a></li>
                <li><a href="exercicios/exercicios.php">Exercícios</a></li>
                <li><a href="ranking/ranking.php">Ranking</a></li>
                <li><a href="../tools/logout.php">Sair</a></li>
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
    <h1>Algoritmos</h1>

    <h2>O que é um Algoritmo?</h2>
    <p>
        Um algoritmo é uma sequência finita de passos bem definidos para resolver um problema ou realizar uma tarefa específica. 
        Ele pode ser representado em uma linguagem de programação, em pseudocódigo ou até mesmo em linguagem natural, dependendo do contexto.
    </p>

    <h2>Como Funcionam os Algoritmos?</h2>
    <p>
        Algoritmos funcionam seguindo etapas lógicas e ordenadas, onde cada passo depende do anterior. Em resumo, um algoritmo possui:
    </p>
    <ul>
        <li><strong>Entrada:</strong> Dados iniciais necessários para o algoritmo funcionar.</li>
        <li><strong>Processamento:</strong> Operações realizadas sobre a entrada para gerar resultados.</li>
        <li><strong>Saída:</strong> Resultado final após o processamento.</li>
    </ul>

    <h2>Algoritmos no Dia a Dia</h2>
    <p>
        Algoritmos estão presentes em várias situações cotidianas. Por exemplo, a preparação de um bolo é um algoritmo: 
    </p>
    <pre>
        <code>
Passo 1: Separe os ingredientes (farinha, ovos, leite, açúcar, fermento).
Passo 2: Misture os ingredientes na ordem certa.
Passo 3: Coloque a massa em uma forma untada.
Passo 4: Asse a massa no forno a 180°C por 40 minutos.
Passo 5: Retire do forno e deixe esfriar antes de servir.
        </code>
    </pre>

    <h2>Exemplo de Algoritmo em Pseudocódigo</h2>
    <p>Vamos criar um algoritmo simples que soma dois números e exibe o resultado:</p>
    <pre>
        <code>
Inicio
    Escreva("Digite o primeiro número:")
    Leia(num1)
    
    Escreva("Digite o segundo número:")
    Leia(num2)
    
    soma <- num1 + num2
    
    Escreva("O resultado da soma é: ", soma)
Fim
        </code>
    </pre>

    <h2>Exercício Proposto</h2>
    <p>
        <strong>Desafio:</strong> Crie um algoritmo em pseudocódigo que receba a idade de uma pessoa e diga se ela é maior ou menor de idade.
    </p>
    <pre>
        <code>
/* Algoritmo: Verificar Maioridade */
Inicio
    Escreva("Digite sua idade:")
    Leia(idade)
    
    Se idade >= 18 Entao
        Escreva("Você é maior de idade")
    Senao
        Escreva("Você é menor de idade")
    FimSe
Fim
        </code>
    </pre>

    <h2>Conclusão</h2>
    <p>
        Algoritmos são essenciais para entender e desenvolver lógica de programação, sendo a base para criar programas eficientes e funcionais.
        A prática constante é fundamental para dominar a criação de algoritmos cada vez mais complexos.
    </p>
</div>


    
    <button id="complete-btn">Marcar como Concluído</button>

    <script>
        document.getElementById("complete-btn").addEventListener("click", function() {
            this.textContent = "Concluído ✅";
            this.style.backgroundColor = "#16a34a"; // tirar dps e fazer uma forma pelo php pra amarzenar essa info pro user
        });
    </script>
</body>
</html>