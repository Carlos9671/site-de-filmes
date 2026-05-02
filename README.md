# 🎬 MyCine

Aplicação web para catálogo e gerenciamento de filmes, desenvolvida como parte de um processo seletivo para vaga de desenvolvedor web júnior.

---

## 🚀 Tecnologias utilizadas

- **Laravel 13** — framework PHP para o back-end
- **Blade** — sistema de templates do Laravel
- **Tailwind CSS** — estilização via classes utilitárias
- **Alpine.js** — interatividade no front-end
- **MySQL** — banco de dados relacional
- **Vite** — compilação de assets

---

## ✨ Funcionalidades

- Listagem de filmes com nome, poster, gêneros, duração e sinopse
- Filtro de filmes por gênero
- Busca de filmes por título
- CRUD completo de filmes (criar, editar, excluir)
- CRUD completo de gêneros com validação de duplicatas
- Proteção contra exclusão de gênero vinculado a filmes
- Relacionamento muitos-para-muitos entre filmes e gêneros
- Interface responsiva para desktop e mobile

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

> Crie o banco `filmes` no MySQL antes de rodar as migrations.

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

## 👨‍💻 Autor

Desenvolvido por **Carlos** como teste prático para vaga de desenvolvedor web júnior.
