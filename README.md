# 📚 Sistema de Gestão de Biblioteca - Projeto Integrador

Um sistema completo de gestão de biblioteca desenvolvido com **Laravel 11**, **Tailwind CSS**, **React/TypeScript** e **MySQL**, com autenticação, CRUD de livros/categorias/empréstimos e relatórios.

---

## 🚀 Passo a Passo para Acessar o Projeto

### 1. **Pré-requisitos**

Certifique-se de ter instalados no seu computador:

- **PHP 8.2+** ([Download](https://www.php.net/downloads))
- **Composer** ([Download](https://getcomposer.org/download/))
- **Node.js** (versão 16+) ([Download](https://nodejs.org/))
- **MySQL** ([Download](https://www.mysql.com/downloads/)) ou **MariaDB**
- **Git** (opcional, para clonar o repositório)

---

### 2. **Clonar ou Baixar o Projeto**

```bash
# Se estiver usando Git
git clone <seu-repositorio> biblioteca
cd biblioteca

# Ou extrair o arquivo .zip baixado
cd biblioteca
```

---

### 3. **Instalar Dependências PHP**

```bash
composer install
```

Aguarde a conclusão da instalação. Isso criará a pasta `vendor/` com todas as dependências.

---

### 4. **Criar o Arquivo de Configuração**

```bash
# Copiar o arquivo de configuração padrão
cp .env.example .env

# Gerar a chave da aplicação (necessária para criptografia)
php artisan key:generate
```

---

### 5. **Configurar o Banco de Dados**

Abra o arquivo `.env` na raiz do projeto e configure:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biblioteca          # Nome do seu banco de dados
DB_USERNAME=root                # Seu usuário MySQL
DB_PASSWORD=                    # Sua senha (deixe em branco se for vazio)
```

**Crie o banco de dados no MySQL:**

```bash
mysql -u root -p
CREATE DATABASE biblioteca;
EXIT;
```

---

### 6. **Executar Migrations e Seeders**

```bash
# Criar as tabelas no banco de dados
php artisan migrate

# Preencher com dados de teste (opcional)
php artisan db:seed
```

---

### 7. **Instalar Dependências JavaScript**

```bash
npm install
```

---

### 8. **Compilar Ativos do Frontend (Vite)**

Em um terminal separado, execute:

```bash
npm run dev
```

Deixe este terminal aberto. Ele compilará automaticamente as mudanças em CSS/JavaScript.

---

### 9. **Iniciar o Servidor Laravel**

Em outro terminal, execute:

```bash
php artisan serve
```

A aplicação estará disponível em: **http://localhost:8000**

---

## 📋 Acessando o Sistema

### Página de Login

Acesse: `http://localhost:8000/login`

**Credenciais padrão (se usado seeders):**
- **Email:** usuario@example.com
- **Senha:** password

Ou crie uma nova conta em `http://localhost:8000/register`

---

### Funcionalidades Principais

Após fazer login, você terá acesso a:

| Seção | Rota | Função |
|-------|------|--------|
| **Dashboard** | `/dashboard` | Visão geral do sistema com estatísticas e atalhos |
| **Livros** | `/books` | Listar, criar, editar e excluir livros |
| **Categorias** | `/categories` | Gerenciar categorias de livros |
| **Empréstimos** | `/loans` | Registrar e acompanhar empréstimos |
| **Relatórios** | `/reports` | Gerar relatórios de livros e empréstimos |
| **Meu Perfil** | `/profile` | Editar informações da sua conta |

---

## 🛠️ Estrutura do Projeto

```
biblioteca/
├── app/                    # Código da aplicação
│   ├── Http/Controllers/  # Controllers (lógica de negócio)
│   └── Models/            # Modelos (Book, Category, Loan, User)
├── database/
│   ├── migrations/        # Estrutura das tabelas
│   ├── factories/         # Dados de teste
│   └── seeders/           # Preenchimento de dados
├── resources/
│   ├── views/             # Templates Blade (HTML)
│   ├── css/               # Estilos
│   └── js/                # JavaScript/React
├── routes/
│   └── web.php            # Definição das rotas
└── public/                # Arquivos públicos (index.php, imagens)
```

---

## 🔧 Comandos Úteis

```bash
# Criar um novo controller
php artisan make:controller NomeController

# Criar um novo modelo com migration
php artisan make:model NomeDo -m

# Listar todas as rotas
php artisan route:list

# Limpar cache
php artisan cache:clear

# Testar o código
php artisan test
```

---

## 📊 Banco de Dados

### Tabelas Principais

- **users** - Usuários do sistema
- **books** - Livros da biblioteca
- **categories** - Categorias de livros
- **loans** - Registro de empréstimos
- **cache** - Cache da aplicação
- **jobs** - Filas de trabalho

---

## 🎨 Tecnologias Utilizadas

- **Laravel 11** - Framework PHP
- **Tailwind CSS** - Framework CSS (utility-first)
- **Vite** - Bundler de ativos (CSS, JS)
- **React 18** - Interface interativa (opcional)
- **TypeScript** - Tipagem JavaScript
- **MySQL/MariaDB** - Banco de dados
- **Blade** - Template engine Laravel

---

## 📝 Notas Importantes

1. **Variáveis de Ambiente**: O arquivo `.env` contém configurações sensíveis. **Nunca commit no Git** com dados reais.

2. **Armazenamento de Arquivos**: Imagens de capas de livros são armazenadas em `storage/app/public/`. Use:
   ```bash
   php artisan storage:link
   ```

3. **Migrações**: Se adicionar novos campos, crie uma nova migration:
   ```bash
   php artisan make:migration add_field_to_table --table=tablename
   ```

---

## 🐛 Solução de Problemas

### Erro "Chave APP_KEY não definida"
```bash
php artisan key:generate
```

### Erro ao conectar ao banco de dados
- Verifique as credenciais no arquivo `.env`
- Certifique-se de que o MySQL está rodando
- Confirme que o banco de dados foi criado

### Erro "npm: comando não encontrado"
- Instale o Node.js: https://nodejs.org/

### Página em branco ou erro 500
- Verifique os logs: `storage/logs/laravel.log`
- Certifique-se de que rodou `php artisan migrate`

---

## 📞 Suporte

Para dúvidas ou problemas, consulte a documentação oficial:
- **Laravel**: https://laravel.com/docs
- **Tailwind**: https://tailwindcss.com/docs
- **React**: https://react.dev/

---

**Desenvolvido como Projeto Integrador** 🎓
