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

<!DOCTYPE html>
<html>
<head>
  <title>Lista de Chamados</title>
  <link rel="stylesheet" href="css/stylo2.css">

</head>
<body>
  <h1>Lista de Chamados</h1>
  <a href="logout.php" class="btn">Sair</a>

  <?php
    include 'connection.php';

    // Conta a quantidade de chamados abertos
    $sql = "SELECT COUNT(*) as total_abertos FROM chamados WHERE status='aberto'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_abertos = $row['total_abertos'];

    // Conta a quantidade de chamados fechados
    $sql = "SELECT COUNT(*) as total_fechados FROM chamados WHERE status='fechado'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_fechados = $row['total_fechados'];

    // Mostra a quantidade de chamados abertos e fechados
    echo "<p>Chamados Abertos: ".$total_abertos."</p>";
    echo "<p>Chamados Fechados: ".$total_fechados."</p>";

    // Seleciona todos os chamados da tabela "chamados"
    $sql = "SELECT * FROM chamados";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Cria uma tabela para mostrar os chamados
      echo "<table>";
      echo "<tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Assunto</th><th>Status</th><th>Data/Hora</th><th>Ações</th></tr>";
      // Output data de cada linha
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["nome"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["descricao"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "<td>".$row["data_hora"]."</td>";
        echo "<td>";
        if ($row["status"] == "aberto") {
          echo "<a href='fechar_chamado.php?id=".$row["id"]."'>Fechar</a> | ";
        }
        echo "<a href='excluir_chamado.php?id=".$row["id"]."'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "Nenhum chamado encontrado.";
    }
    $conn->close();
  ?>


</body>
</html>
