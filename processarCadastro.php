<?php
include 'conectar.php';

$mensagem = "";
$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta os dados
    $nome     = trim($_POST['nome']);
    $email    = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);
    $senha    = trim($_POST['senha']);

    // Criptografar senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Query preparada
    $sql = "INSERT INTO cadastro (nome, email, telefone, endereco, senha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $nome, $email, $telefone, $endereco, $senhaHash);

        if ($stmt->execute()) {
            $mensagem = "Cadastro realizado com sucesso!";
        } else {
            $erro = "Erro ao cadastrar: " . htmlspecialchars($stmt->error);
        }

        $stmt->close();
    } else {
        $erro = "Erro na preparação da consulta: " . htmlspecialchars($conexao->error);
    }
}

$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - EcoVolt</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/png" href="EcoVolt.png">
</head>
<body>
  <header>
    <div class="logo">
      <h1 class="nome">EcoVolt</h1>
      <img src="images/ecovoltLogo.png" alt="Logo EcoVolt" width="50">
      <button id="botao" onclick="darkMode()" class="darqui">☾ ☀︎</button>
    </div>
    <br><br>
    <nav>
      <ul>
        <li><a href="index.html" class="btn">Início</a></li>
        <li><a href="catalogo.html" class="btn">Catálogo</a></li>
        <li><a href="cadastro.html" class="btn">Cadastro</a></li>
        <li><a href="contato.html" class="btn">Contato</a></li>
        <li><a href="sobreNos.html" class="btn">Sobre Nós</a></li>
      </ul>
    </nav>
  </header>

  <div class="conteudo">
    <section class="section">
      <?php if ($mensagem): ?>
        <h2>🎉 <?php echo $mensagem; ?></h2>
        <h3>Bem-vindo, <?php echo htmlspecialchars($nome); ?>!</h3>
        <p>Agora você pode aproveitar todos os recursos da <b>EcoVolt</b>.</p>
        <br>
        
        <a href="index.html" class="btn">Voltar para o Início</a>
      <?php elseif ($erro): ?>
        <h2 style="color:red;">❌ Ocorreu um erro</h2>
        <p><?php echo $erro; ?></p>
        <br>
        <a href="cadastro.html" class="btn">Tentar novamente</a>
        <a href="index.html" class="btn">Voltar para o Início</a>
      <?php endif; ?>
    </section>
  </div>

  <footer class="footer">
    <p>Telefone: 112345-6789</p>
    <p>© 2025 EcoVolt - Todos os direitos reservados.</p>
    <p>Email: ecovoltcontato0@gmail.com</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
