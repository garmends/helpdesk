<?php
    // Faz a conexão com o banco de dados usando o arquivo connection.php
    include("connection.php");
    
    // Cria a consulta SQL para selecionar todos os chamados
    $sql = "SELECT * FROM chamados";
    
    // Executa a consulta SQL
    $result = mysqli_query($conn, $sql);
    
    // Exibe os resultados em uma tabela
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Data e Hora</th></tr>";
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["data_hora"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
?>
<?php
session_start();

// verifica se o usuário está autenticado
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    // redireciona para a página de login
    header("Location: autenticar.php");
    exit;
}

// código da página protegida abaixo
?>

