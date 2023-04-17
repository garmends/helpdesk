<!DOCTYPE html>
<html>
<head>
    <title>Chamados Abertos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        .wes{
            font-weight: 600;
            color: #ACBAE1;
            font-size: 30px;
        }
        .nat{

        }
    </style>
</head>
<body class="nat">

<div class="container mt-3">
    <h1 class="wes">Chamados Abertos</h1>
    <a href="index.php" class="btn">Abrir chamado</a>
    <form method="post">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <button type="submit" class="btn btn-primary" name="buscar">Buscar</button>
    </form>

    <?php
        if (isset($_POST['buscar'])) {
            // Conectar ao banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "helpdesk";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar conexão
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // Preparar consulta SQL
            $nome = $_POST['nome'];
            $sql = "SELECT * FROM chamados WHERE nome = '$nome'";

            // Executar consulta SQL
            $resultado = $conn->query($sql);

            // Exibir resultado em uma tabela
            if ($resultado->num_rows > 0) {
                echo "<h3>Chamados abertos por $nome:</h3>";
                echo "<table class='table'>";
                echo "<thead class='thead-light'><tr><th>Nome</th><th>Email</th><th>Descrição</th><th>Status</th><th>Data e hora</th></tr></thead>";
                echo "<tbody>";
                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["descricao"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>" . $row["data_hora"] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>Nenhum chamado encontrado para $nome.</p>";
            }

            // Fechar conexão
            $conn->close();
        }
    ?>

</div>

</body>
</html>
