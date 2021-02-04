Exemplo de criação de criação de filtros dinâmicos para utilizar num projeto laravel.


Escopo visualizado:
    - No front temos um form de filtros com os filtros abaixo:
        - id
        - name - com a condição "Contendo"
        - birthDateFrom - com a condição ">="
        - birthDateTo - com a condição "<="
        - status = com a condição igual, normalmente o campo é um select

A função "convertFiltersToWhere" trabalha cada filtro possível que viria no request e transforma numa condição Where em formato array aceito pela função "Where" do model.

É possível testar a função convertFiltersToWhere executando o arquivo index.php

Passos.

abrir o prompt na pasta desse projeto

executar o comando "composer dump" para que o autoload gere a pasta vendor
executar o arquivo index.php




