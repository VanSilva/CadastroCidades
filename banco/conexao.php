
<?php

define('PG_HOST', 'localhost');
define('PG_USER', 'postgres');
define('PG_PASSWORD', 'admin');
define('PG_DB_NAME', 'DB_cidade_regiao');


    try {
        $con = new PDO('pgsql:host='.PG_HOST.';port=5432'.';dbname='.PG_DB_NAME.';user='.PG_USER.';password='.PG_PASSWORD); 
        $con->exec("set names utf8");
    }
    catch (PDOException $e) {
        echo 'Erro ao conectar com o Postgres: ' . $e->getMessage();
    }

?> 