<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "ecovolt";

//criar conexão 
$conexao = new mysqli($servidor, $usuario, $senha, $banco );

//verificar erro
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>