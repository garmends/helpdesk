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

<?php
// Verifica se o ID do chamado foi passado pela URL
if (isset($_GET['id'])) {
    // Conecta ao banco de dados
    require_once 'connection.php';

    // Obtém o ID do chamado a ser excluído
    $id = $_GET['id'];

    // Monta a consulta SQL para excluir o chamado
    $sql = "DELETE FROM chamados WHERE id = $id";

    // Executa a consulta SQL
    if (mysqli_query($conn, $sql)) {
        // Se a exclusão foi bem-sucedida, redireciona para a página de listagem de chamados
        header('Location: encerrar.php');
        exit();
    } else {
        // Se ocorreu um erro na exclusão, exibe uma mensagem de erro
        echo "Erro ao excluir chamado: " . mysqli_error($conn);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
} else {
    // Se o ID do chamado não foi passado pela URL, exibe uma mensagem de erro
    echo "ID do chamado não especificado.";
}
