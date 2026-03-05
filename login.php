<?php
session_start();
$conexao = new mysqli("localhost", "root", "", "ecovolt");
 
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
 
if (isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
 
    $stmt = $conexao->prepare("SELECT * FROM cadastro WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
 
    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
 
        if ($senha === $usuario['senha']) { // ⚠️ aqui pode usar password_verify() se a senha estiver criptografada
            $_SESSION['usuario'] = $usuario['nome'];
            $_SESSION['email']   = $usuario['email'];
            header("Location: painel.php");
            exit;
        } else {
            $erro = "❌ Senha incorreta!";
        }
    } else {
        $erro = "❌ Usuário não encontrado!";
    }
}