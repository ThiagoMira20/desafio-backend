# Desafio Backend - Gerenciador de Lugares

Este é um projeto Laravel que implementa uma API simples para gerenciar lugares (CRUD).

## Executando o Projeto

Para executar o projeto, siga estas etapas:

1. Clone o repositório para o seu ambiente local:

git clone https://github.com/seu-usuario/desafio-backend.git

2. Navegue até o diretório do projeto:

cd desafio-backend

3. Instale as dependências do Composer:

composer install

4. Copie o arquivo de ambiente de exemplo e configure-o com suas credenciais de banco de dados:

cp .env.example .env

5. Gere a chave de aplicativo:

php artisan key:generate

6. Execute as migrações para criar as tabelas do banco de dados:

php artisan migrate

7. Inicie o servidor de desenvolvimento sem utilização do docker:

php artisan serve

7.1 Caso queira utilizar o docker :

## Pré-requisitos

- Docker instalado na sua máquina: [Instruções de instalação do Docker](https://docs.docker.com/get-docker/)
- Docker Compose instalado na sua máquina: [Instruções de instalação do Docker Compose](https://docs.docker.com/compose/install/)

docker-compose up -d --build


O servidor estará acessível em `http://localhost:8000` por padrão.

## Endpoints da API

A API fornece os seguintes endpoints:

- `GET /api/places`: Lista todos os lugares.
- `POST /api/places`: Cria um novo lugar.
- `GET /api/places/{id}`: Obtém detalhes de um lugar específico.
- `PUT /api/places/{id}`: Atualiza um lugar existente.
- `DELETE /api/places/{id}`: Exclui um lugar.
- `GET /api/places/search/{name}`: Filtra os lugares por nome.

## Exemplo de Uso

Para criar um novo lugar, envie uma requisição POST para `/api/places` com os dados do lugar no corpo da requisição.

Para listar todos os lugares, envie uma requisição GET para `/api/places`.

Para filtrar os lugares por nome, envie uma requisição GET para `/api/places/search/{name}`.

## Testes

Este projeto inclui testes automatizados para garantir a integridade das funcionalidades. Para executar os testes, use o comando:

php artisan test

## Tecnologias Utilizadas

- Laravel: Framework PHP para desenvolvimento web.
- PostgreSQL: Banco de dados relacional.
