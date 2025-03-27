<?php

$host = 'localhost';      
$dbname = 'teste_sql';    
$username = 'root';       
$password = '';          

try {
    // Criação da conexão PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Configuração para exibir erros, caso ocorram
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar: ' . $e->getMessage();
    exit();  
}
?>
