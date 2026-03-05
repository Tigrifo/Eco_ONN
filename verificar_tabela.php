<?php
include 'conectar.php';

echo "<h2>Verificando estrutura da tabela contato</h2>";

// Verificar estrutura da tabela contato
$result = $conexao->query("DESCRIBE contato");
if ($result) {
    echo "<h3>Estrutura da tabela contato:</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Campo</th><th>Tipo</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Null'] . "</td>";
        echo "<td>" . $row['Key'] . "</td>";
        echo "<td>" . $row['Default'] . "</td>";
        echo "<td>" . $row['Extra'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Erro: " . $conexao->error;
}

// Verificar se a tabela existe
echo "<h3>Verificando se a tabela existe:</h3>";
$result2 = $conexao->query("SHOW TABLES LIKE 'contato'");
if ($result2->num_rows > 0) {
    echo "✓ Tabela 'contato' existe<br>";
} else {
    echo "✗ Tabela 'contato' NÃO existe<br>";
}

$conexao->close();
?>