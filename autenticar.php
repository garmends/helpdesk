<?php
session_start();

// Verifica se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Verifica se os campos de usuário e senha foram preenchidos
    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        // Conecta ao banco de dados
        require_once 'connection.php';

        // Escapa os valores dos campos para prevenir SQL injection
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Verifica se o usuário e a senha estão corretos
        $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            // Cria uma sessão para o usuário
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: encerrar.php');
        } else {
            // Mensagem de erro caso o usuário ou senha estejam incorretos
            $error = "Usuário ou senha incorretos.";
        }
    } else {
        // Mensagem de erro caso algum campo esteja em branco
        $error = "Por favor, preencha todos os campos.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/stylo2.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <label for="username">Usuário</label>
            <input type="text" name="username" required>
            <label for="password">Senha</label>
            <input type="password" name="password" required>
            <button type="submit">Entrar</button>
            <?php if(isset($error)): ?>
                <div class="error"><?= $error ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
