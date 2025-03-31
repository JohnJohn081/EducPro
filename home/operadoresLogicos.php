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
    <h1>Operadores Lógicos, Condicionais e Estruturas de Repetição</h1>

    <h2>O que são Operadores Lógicos?</h2>
    <p>
        Em programação, operadores lógicos são usados para criar expressões condicionais mais complexas. Eles retornam valores booleanos (verdadeiro ou falso) e são frequentemente utilizados dentro de estruturas condicionais e de repetição. Os operadores lógicos em C são:
    </p>
    <ul>
        <li><b>&&</b> - AND: Retorna verdadeiro se ambas as condições forem verdadeiras.</li>
        <li><b>||</b> - OR: Retorna verdadeiro se pelo menos uma das condições for verdadeira.</li>
        <li><b>!</b> - NOT: Inverte o valor lógico de uma condição.</li>
    </ul>
    <br>
    <h3>Exemplo de Operadores Lógicos em C</h3>
    <pre>
        <code>
#include &lt;stdio.h&gt;

int main() {
    int a = 5, b = 10, c = 5;

    if (a == c && b > a) {
        printf("Condição AND verdadeira\n");
    }

    if (a == c || b < a) {
        printf("Condição OR verdadeira\n");
    }

    if (!(a == b)) {
        printf("Condição NOT verdadeira\n");
    }

    return 0;
}
        </code>
    </pre>

    <h2>Condicionais: Tomando Decisões</h2>
    <p>
        Condicionais permitem que um programa execute diferentes blocos de código dependendo de uma condição. Em C, as estruturas condicionais incluem:
    </p>
    <ul>
        <li><b>if</b>: Executa um bloco de código se a condição for verdadeira.</li>
        <li><b>else</b>: Executa um bloco de código caso a condição seja falsa.</li>
        <li><b>else if</b>: Avalia uma nova condição caso a anterior seja falsa.</li>
        <li><b>switch</b>: Utilizado para avaliar uma variável em múltiplos casos possíveis.</li>
    </ul>
    <br>
    <h3>Exemplo de Condicionais em C</h3>
    <pre>
        <code>
#include &lt;stdio.h&gt;

int main() {
    int numero = 3;

    if (numero == 1) {
        printf("Número é 1\n");
    } else if (numero == 2) {
        printf("Número é 2\n");
    } else {
        printf("Número é diferente de 1 e 2\n");
    }

    return 0;
}
        </code>
    </pre>

    <h2>Estruturas de Repetição</h2>
    <p>
        Estruturas de repetição permitem que um bloco de código seja executado várias vezes até que uma condição específica seja atendida. Em C, temos:
    </p>
    <ul>
        <li><b>for</b>: Executa um bloco de código um número específico de vezes.</li>
        <li><b>while</b>: Executa um bloco de código enquanto uma condição for verdadeira.</li>
        <li><b>do-while</b>: Executa um bloco de código pelo menos uma vez, depois continua enquanto a condição for verdadeira.</li>
    </ul>
    <br>
    <h3>Exemplo de Estruturas de Repetição em C</h3>
    <pre>
        <code>
#include &lt;stdio.h&gt;

int main() {
    int i;

    printf("Usando for:\n");
    for (i = 1; i <= 5; i++) {
        printf("%d ", i);
    }

    printf("\nUsando while:\n");
    i = 1;
    while (i <= 5) {
        printf("%d ", i);
        i++;
    }

    printf("\nUsando do-while:\n");
    i = 1;
    do {
        printf("%d ", i);
        i++;
    } while (i <= 5);

    return 0;
}
        </code>
    </pre>

    <h2>Exercício</h2>
    <p>
        Escreva um algoritmo em C que solicite ao usuário um número inteiro e informe se ele é par ou ímpar usando operadores condicionais. Depois, utilize uma estrutura de repetição para imprimir todos os números pares de 1 até o número informado.
    </p>
    <pre>
        <code>
        Exemplo de Saída Esperada:
        Digite um número: 10
        O número 10 é par.

        Números pares de 1 a 10:
        2 4 6 8 10
        </code>
    </pre>
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