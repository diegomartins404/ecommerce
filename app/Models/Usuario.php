<?php
  namespace App\Models;
  class Usuario
  {
    CONST TABLE = 'tb_users';
    private $id;
    private $nome;
    private $email;
    private $senha; 

    public function setId($value){
      $this->id = $value;
    }
    public function setNome($value){
      $this->nome = $value;
    }
    public function setEmail($value){
      $this->email = $value;
    }
    public function setSenha($value){
      $this->senha = $value;
    }

    public function getId(){
      return $this->id;
    }
    public function getNome(){
      return $this->nome;
    }
    public function getEmail(){
      return $this->email;
    }
    public function getSenha(){
      return $this->senha;
    }

    public function Inserir(){
      $sql = new Sql();
      $sql->select("INSERT INTO " . self::TABLE . " (nome, email, senha) VALUES (:NOME, :EMAIL, :SENHA);", array(
        ':NOME' => $this->getNome(),
        ':EMAIL' => $this->getEmail(),
        ':SENHA' => password_hash($this->getSenha(), PASSWORD_ARGON2I)
      ));
    }

    public function Recupera($email): bool{
      $sql = new Sql();
      $usuario = $sql->select("SELECT * FROM " . self::TABLE . " WHERE email = :EMAIL;", array(
        ':EMAIL' => $email
      ));
      if(isset($usuario)){
        $usuario = $usuario[0];
        $this->setEmail($usuario['email']);
        $this->setSenha($usuario['senha']);
        return true;
      }else{
        return false;
      }
    }
    public function VerificaSenha($rawSenha): bool{
      return password_verify($rawSenha, $this->getSenha());
    } 



  }
?>