<?php
class Usuario implements \Serializable {
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function autenticar($email, $senha) {
        return ($this->email === $email && password_verify($senha, $this->senha));
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function serialize() {
        return serialize([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha
        ]);
    }

    public function unserialize($data) {
        $dados = unserialize($data);
        $this->nome = $dados['nome'];
        $this->email = $dados['email'];
        $this->senha = $dados['senha'];
    }
}
?>