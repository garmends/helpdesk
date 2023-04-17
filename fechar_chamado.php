<?php
// Inclui o arquivo de conexão com o banco de dados
include('connection.php');

// Verifica se foi recebido o parâmetro "id" via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verifica se o chamado existe no banco de dados
    $stmt = $conn->prepare("SELECT * FROM chamados WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Recupera as informações do chamado
        $chamado = $result->fetch_assoc();

        // Verifica se foi submetido o formulário de fechamento do chamado
        if (isset($_POST['status'])) {
            $status = $_POST['status'];

            // Atualiza o status do chamado no banco de dados
            $stmt = $conn->prepare("UPDATE chamados SET status = ? WHERE id = ?");
            $stmt->bind_param("si", $status, $id);
            $stmt->execute();

            // Redireciona para a página de listagem de chamados
            header('Location: encerrar.php');
            exit();
        }

        // Verifica se foi submetido o formulário de exclusão do chamado
        if (isset($_POST['excluir'])) {
            // Exclui o chamado do banco de dados
            $stmt = $conn->prepare("DELETE FROM chamados WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            // Redireciona para a página de listagem de chamados
            header('Location: encerrar.php');
            exit();
        }
    } else {
        // Caso o chamado não exista no banco de dados, redireciona para a página de listagem de chamados
        header('Location: encerrar.php');
        exit();
    }
} else {
    // Caso o parâmetro "id" não tenha sido recebido via GET, redireciona para a página de listagem de chamados
    header('Location: encerrar.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fechar/Excluir Chamado</title>
</head>
<body>
    <h1>Fechar/Excluir Chamado</h1>


    <form method="POST">
        <p><strong>Status:</strong></p>
        <select name="status">
            <option value="aberto" <?php if ($chamado['status'] == 'aberto') echo 'selected'; ?>>Aberto</option>
            <option value="fechado" <?php if ($chamado['status'] == 'fechado') echo 'selected'; ?>>Fechado</option>
        </select>
        <br><br>
        <input type="submit" value="Fechar Chamado">
    </form>

    <form method="POST">
        <input type="hidden" name="excluir" value="true">
