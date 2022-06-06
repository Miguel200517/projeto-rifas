<?php

// carregar as credenciais do banco de dados 
$hostname = "sql209.epizy.com";
$database= "epiz_31448439_sysrifas";
$user= "epiz_31448439";
$passaword= "ZCXbZ4iT5tq9";

try{
$pdo = new PDO('mysql:host='.'$hostname.';dbname='$database, $user, $password);
$pdo->setAttribute(PDO:: ATRR_ERRMODE,PDO::  ERRMODE_EXCEPTION);
echo 'conexão com o banco de dados'.$database.', foi realizado com sucesso!';
    
} catch(PDOException $e) {
    echo 'erro:' .$e->getMessage();

}