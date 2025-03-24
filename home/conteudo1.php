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
    <h1>Estruturas de Dados</h1>

    <h2>O que são Estruturas de Dados?</h2>
    <p>
        Estruturas de dados são formas organizadas de armazenar e manipular informações em um programa. Elas são essenciais 
        para otimizar a eficiência e a escalabilidade do código. Algumas das mais comuns são: arrays, listas, pilhas, filas e árvores.
    </p>

    <h2>Principais Estruturas de Dados</h2>
    
    <h3>1. Arrays (Vetores)</h3>
    <p>
        Arrays armazenam múltiplos valores em um único nome de variável, acessados por um índice. São úteis para organizar grandes quantidades de dados do mesmo tipo.
    </p>
    <pre>
        <code>
        int numeros[5] = {10, 20, 30, 40, 50};  // Array com 5 elementos
        printf("Primeiro número: %d", numeros[0]);  // Saída: 10
        </code>
    </pre>

    <h3>2. Listas Ligadas</h3>
    <p>
        Diferente dos arrays, listas ligadas permitem inserção e remoção dinâmicas de elementos, pois cada nó aponta para o próximo na memória.
    </p>
    <pre>
        <code>
        struct Node {
            int valor;
            struct Node* proximo;
        };
        </code>
    </pre>

    <h3>3. Pilhas (Stacks)</h3>
    <p>
        Pilhas seguem o princípio **LIFO (Last In, First Out)**, ou seja, o último elemento inserido é o primeiro a ser removido. No C, podemos manipular pilhas usando arrays ou listas ligadas.
    </p>
    <pre>
        <code>
        #define TAMANHO 5
        int pilha[TAMANHO];
        int topo = -1;

        void push(int valor) {
            if (topo < TAMANHO - 1) {
                topo++;
                pilha[topo] = valor;
            }
        }
        </code>
    </pre>

    <h3>4. Filas (Queues)</h3>
    <p>
        Filas seguem o princípio **FIFO (First In, First Out)**, onde o primeiro elemento adicionado é o primeiro a ser removido. São úteis para processamento de tarefas e algoritmos como BFS (Busca em Largura).
    </p>
    <pre>
        <code>
        struct Fila {
            int elementos[10];
            int frente, tras;
        };
        </code>
    </pre>

    <h2>Conclusão</h2>
    <p>
        Estruturas de dados são fundamentais para qualquer desenvolvedor. Elas permitem otimizar a eficiência dos programas 
        e são amplamente utilizadas em aplicações reais, como bancos de dados, sistemas operacionais e inteligência artificial.
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