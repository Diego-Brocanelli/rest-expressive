# API Rest utilizando o micro framework Expressive.

Esta API foi construída para estudo do micro-framework Expressive e middleware, abaixo segue links para acesso ao framework e a um skeletom.

Link para acesso ao framework [zendframework/zend-expressive](https://github.com/zendframework/zend-expressive).

Link para acesso ao skeleton [zendframework/zend-expressive-skeleton](https://github.com/zendframework/zend-expressive-skeleton)

Esta API foi criada tendo como base o repositório [eminetto/restbeer-expressive](https://github.com/eminetto/restbeer-expressive). do grande [Eltom Minetto](http://eltonminetto.net/).

# Instalação
Para instalar as dependências.
```
composer install
```
Criar o bando de dados
```
rest_expressive
```
Para criar a tabela no banco de dados (realizar o comando na raiz no projeto).
```
./vendor/bin/doctrine orm:schema-tool:create
```
## Configuração de acesso ao banco de dados
***config/dbConfig.php***
```php
$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'dbname'   => 'rest_expressive',
];
```
## Iniciar o sistema com o servidor embutido do PHP
```
php -S localhost:8080
```

## Rotas
```php
listar produtos | Method: (GET)
    /api/products
Retornar produto | Method: (GET)
    /api/products/item/{ID}
Atualizar produto | Method: (PUT)
    /api/products
Remover produto | Method: (DELETE)
    /api/products/item/1
```

# Token de acesso
Toda requisição dever ter contido dentro do HEADER a seguinte informação:
```
authorization:987654321abc
```
Sendo a key 'authorization' e o valor '987654321abc'.
Para acessar os recursos da API.

# Observações
Para quem tiver maior interesse no micro-framework o [Eltom Minetto](http://eltonminetto.net/) gravou um screencast bem interessante [Criando uma API usando Zend\Expressive](https://www.youtube.com/watch?v=ApfVtIa_gfE).
