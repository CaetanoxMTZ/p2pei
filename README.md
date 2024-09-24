# Projeto MAG

Este projeto é um sistema que simula uma rede social similar ao linkedin, porém mais simples e intuitiva

## Pré-requisitos

- PHP 8.2
- Laravel 11.x
- PostgreSQL instalado e configurado


## Instalação

### 1. Clone o repositório:

```bash
git clone https://github.com/CaetanoxMTZ/p2pei.git
cd p2pei
```


### 2. Instale as dependências e execute os comandos necessários:

```bash
composer install
npm install 
php artisan key:generate
php artisan migrate
npm run build
```


### 3. Configure variáveis de ambiente:

```bash
DB_CONNECTION=pgsql (tem que ser pgsql)
DB_HOST=localhost
DB_PORT=porta_padrao
DB_DATABASE=nome_db
DB_USERNAME=user_db
DB_PASSWORD=

```

### 5. Executando o projeto:

```bash
Para rodar o sistema, execute o seguinte comando: php artisan serve 
```