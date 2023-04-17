<?php
// informações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpdesk";

// faz a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
	die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}
?>
