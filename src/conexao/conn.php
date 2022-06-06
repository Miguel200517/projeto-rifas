<?php

//Carregar as credenciais do banco de bados 
$hostname = "sql109.epizy.com";
$database = "epiz_31629778_sysrifa";
$user = "epiz_31629778";
$passaword = "k1xhKt3Yuyy9hI";

try{
    $pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $user, $passaword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Conexão com banco de dados '.$database.', foi realizado com sucesso!';

} catch(PDOException $e){
    echo 'Erro: '.$e->getMessage();
}