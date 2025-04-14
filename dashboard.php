<?php
require_once "classes/Sessao.php";
Sessao::iniciar();

$nome = Sessao::get("usuario");

if (!$nome) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área Restrita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e9f5ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .dashboard {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Parabéns, <?php echo $nome; ?>!</h2>
        <p>Você conseguiu fazer login com sucesso.</p>
        <p><a href="logout.php">Sair</a></p>
    </div>
</body>
</html>
