<?php
// Incluir o arquivo de conexão com o banco de dados
include 'server.php';  // Certifique-se de que esse arquivo contém a conexão com o MySQL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber dados do formulário
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Verificar se os campos estão preenchidos
    if (!empty($username) && !empty($email) && !empty($password)) {
        // Criptografar a senha antes de armazenar
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        // Inserir usuário no banco de dados
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $passwordHashed);

        if ($stmt->execute()) {
            echo "Conta criada com sucesso!";
            // Redirecionar para a página de login ou outra página
            header("Location: login.php");
            exit();
        } else {
            echo "Erro ao criar a conta. Tente novamente.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

// Fechar a conexão
$conn->close();
?>
