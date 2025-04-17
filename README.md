# 🚀 EducPro

**EducPro** é uma plataforma web educacional que oferece conteúdos interativos e exercícios sobre lógica de programação. O sistema permite cadastro e login de usuários, além de acompanhar o progresso por meio de XP e níveis.

---

## 📌 Funcionalidades

- 🔐 **Autenticação de Usuários** (login e cadastro)
- 👨‍🎓 **Controle de Sessão com Validação**
- 📚 **Página de Conteúdos** com temas como:
  - Algoritmos
  - Tipos Primitivos e Operadores Aritméticos
  - Operadores Lógicos e Estruturas de Controle
- 🧠 **Sistema de XP e Níveis**
- 🏆 **Ranking de Usuários**
- ✅ **Sistema de Logout**
- 📱 Interface responsiva em HTML e CSS

---

## 💻 Tecnologias Utilizadas

- **PHP**: Backend e lógica do sistema
- **MySQL**: Banco de dados relacional para armazenar usuários, XP e progresso
- **HTML & CSS**: Estrutura e estilização das páginas

---

## 📂 Estrutura de Pastas

```
EducPro/
│
├── css/                  # Arquivos de estilo (style.css, home.css, etc)
├── imagem/               # Ícones e imagens do sistema
├── loginUser/            # Telas e scripts de login/cadastro
│   ├── cadastro.html
│   ├── cad.php
│   └── login.php
├── tools/                # Scripts auxiliares (conexão e logout)
│   ├── conexao.php
│   └── logout.php
├── home/                 # Página inicial e conteúdos
│   ├── conteudos.php
│   └── (demais conteúdos como algoritmo.php, tiposPrimitivos.php, etc)
└── index.php             # Tela de login principal
```

---

## ⚙️ Como Executar

1. Clone este repositório:
   ```bash
   git clone https://github.com/JohnJohn081/EducPro
   ```

2. Configure o ambiente local com um servidor como **XAMPP** ou **WAMP**.

3. Crie o banco de dados `dbgeral` no MySQL com a seguinte tabela:

   ```sql
   CREATE TABLE pessoas (
     id INT AUTO_INCREMENT PRIMARY KEY,
     usuario VARCHAR(255),
     nameUser VARCHAR(255),
     passwordUser VARCHAR(255),
     emailUser VARCHAR(255),
     xp INT DEFAULT 0,
     level INT DEFAULT 1
   );
   ```

4. Acesse `localhost/EducPro/index.php` no navegador.

---

## 🧑‍🏫 Créditos

Desenvolvido por [JohnJohn081](https://github.com/JohnJohn081) com o objetivo de oferecer uma ferramenta de apoio ao ensino de programação.

---

## 📃 Licença

Este projeto é de uso livre para fins educacionais.
