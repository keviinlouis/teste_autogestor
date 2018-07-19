# Projeto Teste AutoGestor

##Configurações iniciais

Há duas formas de se rodar o projeto, diretamente pelo laravel ou criando dois servidores, um para o backend e um para o frontend.
<br>
Para configurar o projeto laravel rode os seguintes comandos

- cd autogestor_backend
- composer install
- php artisan key:generate
- php artisan jwt:secret
- Abra o .env e configure o banco de dados<br>
- php artisan migrate --seed<br>

O projeto estará pronto para ser utilizado, o login e a senha do admin são master@master.com e 123456, pode ser acessado em http://localhost:8000/admin/login<br>
O codigo do front end estará em resources/assets/js<br>

Para configurar o projeto do front end rode os seguintes comandos

- cd autogestor_frontend
- npm i
- npm run dev

O projeto estará pronto para ser utilizado, podendo ser acessado em http://localhost:8001

## Rotas

- Login Usuario comum: /login
- Login Admin: /admin/login

## Usuarios

Os emails para usuarios é usuario_{i}@mail.com sendo {i} um numero de 1 a 9<br>
A senha é padrão: 123456

