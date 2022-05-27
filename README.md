<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Sobre o projeto

O projeto consiste em um CRUD de usuários com a tabela da Unimestre, onde ele valida o usuário e senha por cliente e retorna um JWT válido para ser usado como autenticação em rotas protegidas. As rotas que necessitam de autenticação para ver o retorno tem como objetivo trazer um curso ou todos os cursos de um determinado professor.

- "/api/all-courses" GET - Listagem de todos os cursos de um professor específico (necessita o parâmetro "cd_professor");
- "/api/course" GET - Listagem de um curso específico pelo ID do mesmo (necessita o parâmetro "cd_curso");
- "/api/profile/{cd_pessoa}" GET - Listagem de um usuário específico pelo ID do mesmo (necessita o parâmetro "cd_pessoa");

- "/api/auth/login" POST - Realiza o login e gera um JWT (necessita os parâmetros "cd_cliente", "ds_login", "ds_senha");
- "/api/auth/logout" POST - Invalida o JWT do usuário (necessita o JWT na autenticação);
- "/api/auth/refresh" POST - Gera um novo token para o usuário (necessita o JWT na autenticação);
- "/api/auth/register" POST - Cria novo usuário no banco de dados com senha criptografada (necessita os parâmetros "cd_cliente", "ds_nome", "ds_login", "ds_senha").

## Pacotes externos
- [JWT AUTH](https://jwt-auth.readthedocs.io/en/develop/laravel-installation/);
- [Model Generator](https://github.com/krlove/eloquent-model-generator).

## Objetivo

A finalidade deste projeto é ver se o laravel pode ser uma boa alternativa de tecnologia para construção de API's para a Unimestre.
