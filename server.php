<?php
$servername = "localhost";  // Nome do servidor MySQL
$username = "root";         // Usuário do MySQL
$password = "!Quicouri";             // Senha do MySQL
$dbname = "basifulgames";   // Nome do banco de dados

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
