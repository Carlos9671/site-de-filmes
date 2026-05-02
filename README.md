# 🎬 MyCine — Carlos Renzellmann de Almeida

Aplicação web para catálogo e gerenciamento de filmes, desenvolvida como teste prático para vaga de desenvolvedor web júnior.

---

## 🛠️ Tecnologias e versões

- **PHP** 8.5.5
- **Laravel** 13.6.0
- **MySQL** 8.0
- **Blade** — sistema de templates do Laravel
- **Tailwind CSS** — estilização via classes utilitárias
- **Alpine.js** — interatividade no front-end
- **Vite** — compilação de assets

---

## ✨ Funcionalidades

- Listagem de filmes com poster, gêneros, duração e sinopse
- Filtro de filmes por gênero
- Busca de filmes por título
- Tela de detalhes do filme
- CRUD completo de filmes (criar, editar, excluir)
- CRUD completo de gêneros com validação de duplicatas
- Proteção contra exclusão de gênero vinculado a filmes
- Relacionamento muitos-para-muitos entre filmes e gêneros
- Painel administrativo separado
- Interface responsiva para desktop e mobile com menu hamburguer

---

## 🎁 Bônus implementados

- **Responsividade mobile** — navbar com menu hamburguer, sidebar vira dropdown no mobile e cards se adaptam ao tamanho da tela
- **Filtro por gênero + busca combinados** — é possível filtrar por gênero e buscar por título ao mesmo tempo
- **Feedback visual** — mensagens de sucesso com desaparecimento automático após 2 segundos
- **Proteção de gêneros** — gêneros vinculados a filmes não podem ser deletados, exibindo mensagem de erro com a quantidade de filmes vinculados
- **Relacionamento muitos-para-muitos** — um filme pode ter vários gêneros e um gênero pode pertencer a vários filmes, usando tabela intermediária

---

## ⚙️ Como rodar o projeto localmente

### Pré-requisitos

Certifique-se de ter instalado:

- [PHP 8.2+](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [MySQL](https://www.mysql.com/)
- [Git](https://git-scm.com/)

### Passo a passo

**1. Clone o repositório**
```bash
git clone https://github.com/Carlos9671/site-de-filmes.git
cd site-de-filmes
```

**2. Instale as dependências**
```bash
composer install
npm install
```

**3. Configure o ambiente**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Configure o banco de dados no arquivo `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=filmes
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

> Crie o banco `filmes` no MySQL antes de rodar as migrations. Configure as credenciais de acordo com o seu ambiente local.

**5. Rode as migrations e popule o banco**
```bash
php artisan migrate --seed
```

**6. Suba os servidores**

Em dois terminais separados:
```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

**7. Acesse no navegador**
```
http://localhost:8000
```

---

## 🗄️ Modelagem do banco

- **filmes** — id, titulo, sinopse, duracao, poster, timestamps
- **generos** — id, genero (único), timestamps
- **filme_genero** — tabela intermediária (muitos-para-muitos)

---

## 📁 Estrutura principal

```
app/
├── Http/Controllers/
│   ├── FilmeController.php   # CRUD de filmes
│   ├── GeneroController.php  # CRUD de gêneros
│   └── AdminController.php   # Painel administrativo
├── Models/
│   ├── Filme.php
│   └── Genero.php
database/
├── migrations/               # Estrutura das tabelas
└── seeders/                  # Dados iniciais
resources/views/
├── filmes/                   # Telas de filmes
├── generos/                  # Telas de gêneros
└── admin/                    # Painel admin
```