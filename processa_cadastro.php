<?php
require_once "classes/Autenticador.php";

$nome = htmlspecialchars($_POST['nome']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'];

if ($nome && $email && $senha) {
    Autenticador::registrar($nome, $email, $senha);
    header("Location: login.php");
} else {
    echo "Dados inválidos. Tente novamente.";
}
?>