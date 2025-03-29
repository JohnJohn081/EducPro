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
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <div id="sidebar">
        <div>
            <h2>EducPro</h2>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="conteudos.php">Conteúdos</a></li>
                <li><a href="exercicios.php">Exercícios</a></li>
                <li><a href="ranking.php">Ranking</a></li>
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
    <h1>Lógica de Programação</h1>

    <h2>O que é Lógica de Programação?</h2>
    <p>
        Lógica de programação é a base para o desenvolvimento de qualquer software. Ela envolve a sequência lógica de instruções 
        que um programa deve seguir para resolver um problema. Independentemente da linguagem utilizada, os princípios 
        da lógica de programação permanecem os mesmos.
    </p>

    <h2>Estruturas Fundamentais</h2>
    
    <h3>1. Variáveis e Tipos de Dados</h3>
    <p>
        As variáveis são espaços na memória do computador onde podemos armazenar valores. No C, podemos definir variáveis de diferentes tipos:
    </p>
    <pre>
        <code>
        int idade = 25;          // Número inteiro
        float altura = 1.75;     // Número decimal
        char letra = 'A';        // Caractere único
        </code>
    </pre>

    <h3>2. Estruturas Condicionais</h3>
    <p>
        Condicionais permitem que o programa tome decisões com base em certas condições. No C, utilizamos `if`, `else if` e `else`:
    </p>
    <pre>
        <code>
        int idade = 18;
        if (idade >= 18) {
            printf("Você é maior de idade!");
        } else {
            printf("Você é menor de idade.");
        }
        </code>
    </pre>

    <h3>3. Estruturas de Repetição</h3>
    <p>
        Laços de repetição são usados para executar um bloco de código várias vezes. No C, podemos usar `for`, `while` e `do-while`:
    </p>
    <pre>
        <code>
        int i;
        for (i = 1; i <= 5; i++) {
            printf("Número: %d\n", i);
        }
        </code>
    </pre>

    <h3>4. Funções</h3>
    <p>
        Funções ajudam a organizar o código, tornando-o mais reutilizável e modular. Veja um exemplo de função em C:
    </p>
    <pre>
        <code>
        int soma(int a, int b) {
            return a + b;
        }

        int main() {
            int resultado = soma(10, 5);
            printf("A soma é: %d", resultado);
            return 0;
        }
        </code>
    </pre>

    <h2>Conclusão</h2>
    <p>
        Compreender lógica de programação é essencial para qualquer desenvolvedor. A prática constante e a resolução de problemas 
        ajudam a aprimorar essa habilidade, tornando a programação mais intuitiva e eficiente.
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