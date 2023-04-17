<?php
session_start();
// Inclui o arquivo de conexão com o banco de dados
require_once 'connection.php';

// Recupera os valores dos campos do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$departamento = $_POST['departamento'];
$descricao = $_POST['descricao'];

// Insere os dados do chamado no banco de dados
$sql = "INSERT INTO chamados (nome, email, departamento, descricao) VALUES ('$nome', '$email', '$departamento', '$descricao')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] =   "Chamado criado com sucesso!";
    header('Location: index.php');
   
} else {
	 $_SESSION['msg'] =   "Chamado não criado!!";
	 header('Location: index.php');
    
}


