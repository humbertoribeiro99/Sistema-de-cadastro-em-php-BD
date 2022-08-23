<?php

    try{
        $pdo = new PDO(
            'mysql:host=127.0.0.1;dbname=projetoDois;charset=utf8;port3306',
            'root','15975300'
        );
    }
    catch(PDOException $e){
        echo "Erro: ", $e->getMessage();
    }

?>