<?php
session_start();
 
// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel - EcoVolt</title>
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
      <li><a href="index.html" class="btn">Inicio</a></li>
        <li><a href="catalogo.html" class="btn">Catalogo</a></li>
        <li><a href="cadastro.html" class="btn">Cadastro</a></li>
        <li><a href="login.html" class="btn">Faça seu Login</a></li>
        <li><a href="contato.html" class="btn">Contato</a></li>
        <li><a href="sobreNos.html" class="btn">Sobre Nós</a></li>
      </ul>
    </nav>
  </header>
 
  <div class="conteudo">
    <section class="section">
      <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
      <p>Você está logado e pronto para alugar seus carros elétricos favoritos!</p>
      <a href="index.html" class="btn">Sair</a>
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
 