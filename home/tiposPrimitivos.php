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
    <h1>Tipos Primitivos e Operadores Aritméticos</h1>

    <h2>O que são Tipos Primitivos?</h2>
    <p>
        Em programação, os tipos primitivos representam dados fundamentais que um programa pode manipular diretamente. Eles são essenciais para definir variáveis e armazenar informações. Na linguagem C, os principais tipos primitivos são:
    </p>
    <ul>
        <li><b>int</b>: Utilizado para armazenar números inteiros, como -10, 0, 25. A quantidade de memória ocupada por um <code>int</code> geralmente é de 4 bytes, dependendo do compilador e arquitetura.</li>
        <li><b>float</b>: Utilizado para armazenar números decimais de precisão simples, como 3.14, -0.5. Ocupa 4 bytes de memória.</li>
        <li><b>double</b>: Similar ao <code>float</code>, mas com precisão dupla, permitindo armazenar valores decimais maiores e mais precisos. Ocupa 8 bytes de memória.</li>
        <li><b>char</b>: Utilizado para armazenar um único caractere ASCII, como 'A' ou 'z'. Ocupa 1 byte de memória.</li>
    </ul>
    <br>
    <h3>Exemplo de Declaração em C</h3>
    <pre>
        <code>
    #include &lt;stdio.h&gt;

    int main() {
        int idade = 20;
        float altura = 1.75;
        char inicial = 'A';
        double salario = 2500.50;

        printf("Idade: %d\n", idade);
        printf("Altura: %.2f\n", altura);
        printf("Inicial: %c\n", inicial);
        printf("Salário: %.2lf\n", salario);

        return 0;
    }
        </code>
    </pre>
    <p>Observe que o <code>%.2f</code> e <code>%.2lf</code> são usados para limitar a exibição de casas decimais.</p>
    <br>
    <h2>Operadores Aritméticos</h2>
    <p>
        Operadores aritméticos são usados para realizar cálculos matemáticos básicos em C. Eles ajudam a manipular valores numéricos e realizar operações essenciais. Os principais operadores aritméticos são:
    </p>
    <ul>
        <li><b>+</b> Adição - Soma dois valores. Ex: <code>a + b</code></li>
        <li><b>-</b> Subtração - Subtrai um valor de outro. Ex: <code>a - b</code></li>
        <li><b>*</b> Multiplicação - Multiplica dois valores. Ex: <code>a * b</code></li>
        <li><b>/</b> Divisão - Divide um valor pelo outro. Ex: <code>a / b</code></li>
        <li><b>%</b> Módulo - Retorna o resto da divisão inteira. Ex: <code>a % b</code> (Apenas para inteiros)</li>
    </ul>
    <br>
    <h3>Exemplo de Operações Aritméticas em C</h3>
    <pre>
        <code>
    #include &lt;stdio.h&gt;

    int main() {
        int a = 10, b = 3;

        printf("Soma: %d\n", a + b);
        printf("Subtração: %d\n", a - b);
        printf("Multiplicação: %d\n", a * b);
        printf("Divisão: %d\n", a / b);
        printf("Módulo: %d\n", a % b);

        return 0;
    }
        </code>
    </pre>
    <p>Observe que a divisão de inteiros em C retorna apenas a parte inteira do resultado. Para um resultado mais preciso, use tipos <code>float</code> ou <code>double</code>.</p>

    <h2>Precedência de Operadores</h2>
    <p>
        Em expressões matemáticas complexas, a precedência de operadores determina a ordem de execução dos cálculos:
    </p>
    <ul>
        <li><b>( )</b> Parênteses - Maior prioridade, resolvido primeiro</li>
        <li><b>* / %</b> Multiplicação, Divisão e Módulo - Resolvidos em ordem da esquerda para a direita</li>
        <li><b>+ -</b> Adição e Subtração - Resolvidos por último, da esquerda para a direita</li>
    </ul>
    <p>Exemplo: A expressão <code>5 + 3 * 2</code> é interpretada como <code>5 + (3 * 2)</code>, resultando em 11 e não 16.</p>

    <h2>Exercício</h2>
    <p>
        Escreva um algoritmo em C que solicite ao usuário dois números inteiros e exiba o resultado das operações de adição, subtração, multiplicação, divisão e módulo.  
    </p>
    <pre>
        <code>
        Exemplo de Saída Esperada:
        Digite o primeiro número: 10
        Digite o segundo número: 3

        Soma: 13
        Subtração: 7
        Multiplicação: 30
        Divisão: 3
        Módulo: 1
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