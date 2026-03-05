<?php
include 'conectar.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Inserir no banco 
$sql = "INSERT INTO contato (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

if ($conexao->query($sql) === TRUE) {
    echo "Mensagem enviada com sucesso";
    echo '<br><br><a href="index.html"><button type="button">Voltar para Home</button></a>';
} else {
    echo "Erro: " . $conexao->error;
    echo '<br><br><a href="index.html"><button type="button">Voltar para Home</button></a>';
}

$conexao->close();
?>
