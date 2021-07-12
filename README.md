# Sistema_gerenciamento_estoque
Sistema de gerenciamento de estoque, feito em laravel 8 e utilizando bootstrap 4.

Sistema de gerencia de estoque, com níveis de acesso a usuário, onde o usuario pode cadastrar seus produtos, editar e deletar. 

Como executar o Sistema:

1 - Para executar o projeto em Lavarel precisa ter o gerenciador de pacotes Composer installado.
2 - execute composer install para a instalção das dependências.
3 - abra o projeto em algum editor de texto de sua preferencia, e procure pelo arquivo .env, nele estará todas as configurações da conexão com o banco de dados.
4 - utilize as suas configurações do seu banco de dados, o projeto é rodado em mysql.
4.2 utilize php artisan key:generate para gerar a key de acesso ao BD.
5 - Use um terminal de comandos de preferência o terminal do editor de texto visual studio code, acessa até a pagina do projeto chamada de gerenciamento_estoque.
6 - Logo depois execute a criação das Migrations, no seu terminal execute a linha de comando php artisan migrate.
7 - Agora já pode abrir o porjeto, crie com a linha de comando php artisan serve para gerar um servidor local, e entrar no link gerado: http://127.0.0.1:8000/
8 - terá acesso ao sistema.

