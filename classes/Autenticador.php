<?php
require_once "Usuario.php";

class Autenticador {
    private static $arquivo = __DIR__ . '/../usuarios.txt';

    public static function registrar($nome, $email, $senha) {
        $usuario = new Usuario($nome, $email, $senha);
        $usuarios = self::carregarUsuarios();
        $usuarios[] = $usuario;
        file_put_contents(self::$arquivo, serialize($usuarios));
    }

    public static function logar($email, $senha) {
        $usuarios = self::carregarUsuarios();
        foreach ($usuarios as $usuario) {
            if ($usuario->autenticar($email, $senha)) {
                return $usuario;
            }
        }
        return null;
    }

    private static function carregarUsuarios() {
        if (!file_exists(self::$arquivo)) return [];
        $dados = file_get_contents(self::$arquivo);
        return unserialize($dados) ?: [];
    }
}
?>