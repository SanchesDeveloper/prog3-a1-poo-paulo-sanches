<?php
require_once "classes/Autenticador.php";
require_once "classes/Sessao.php";

Sessao::iniciar();

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = Autenticador::logar($email, $senha);

if ($usuario) {
    Sessao::set("usuario", $usuario->getNome());
    if (isset($_POST['lembrar'])) {
        setcookie("email", $email, time() + (86400 * 30), "/");
    }
    header("Location: dashboard.php");
} else {
    echo "Credenciais inválidas. Tente novamente.";
}
?>