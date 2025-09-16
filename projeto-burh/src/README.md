# Desafio Backend BURH

Este � o projeto backend desenvolvido para o desafio da Burh.

## Tecnologias Utilizadas

- PHP, com Laravel
- MySql
- Docker

## Como executar

Primeiro que ser� preciso ter o Docker instalado na m�quina.

1. Inicializar o cont�iner:
   ```
   docker-compose up -d
   ```
2. Rodar as migrations e factories (vai criar as empresas e usu�rios de exemplo):
   ```
   docker exec -it laravel-app bash
   php artisan migrate:fresh --seed
   ```
3. Inicie o servidor:
   ```
   php artisan serve
   ```

Qualquer altera��o no ambiente pode ser realizado nos arquivos `docker-compose.yml`, `Dockerfile`, ou `.env`.

Para conectar no banco, use estes par�metros:
<table>
    <tr>
        <td>IP</td>
        <td>127.0.0.1</td>
    </tr>
    <tr>
        <td>Porta</td>
        <td>3306</td>
    </tr>
    <tr>
        <td>Usu�rio</td>
        <td>laravel</td>
    </tr>
    <tr>
        <td>Senha</td>
        <td>secret</td>
    </tr>
</table>

## Testes

Para rodar os testes:
```
php artisan test
```
