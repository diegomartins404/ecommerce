<?php
  namespace App\Domain\Model;

  class Produto{
    CONST TABLE = "tb_products";
    private $nome;
    private $valor;
    private $qtd;
    private $id;

    public function __construct($nome='', $valor='', $qtd='')
    {
      $this->setNome($nome);
      $this->setValor($valor);
      $this->setQtd($qtd);
    }

    public function setAll(array $array)
    {
      extract($array);
      $this->setId($id);
      $this->setNome($nome);
      $this->setValor($valor);
      $this->setQtd($qtd);
    }

    
    public function setId($value){
      $this->id = $value;
    }
    public function getId(){
      return $this->id;
    }


    public function setNome($value){
      $this->nome = $value;
    }
    public function setValor($value){
      $this->valor = $value;
    }
    public function setQtd($value){
      $this->qtd = $value;
    }


    public function getNome(){
      return $this->nome;
    }
    public function getValor(){
      return $this->valor;
    }
    public function getQtd(){
      return $this->qtd;
    }

    
    public function Persistir(){
      $sql = new Sql();
      $res = $sql->select("INSERT INTO tb_products (nome, valor, qtd) VALUES (:NOME, :VALOR, :QTD);", array(
        ':NOME' => $this->getNome(),
        ':VALOR' => $this->getValor(),
        ':QTD' => $this->getQtd()
      ));
    }

    public function Recuperar($id = ''){
      $sql = new Sql();
      if($id != ''){
        $resultado = $sql->select("SELECT * FROM " . self::TABLE . " WHERE id = :ID",  array(
          ':ID' => $id
        ));
        return $resultado[0];
      }else{
        $resultado = $sql->select("SELECT * FROM " . self::TABLE);
        return $resultado;
      }
    }


    public function Excluir($id){
      $sql = new Sql();
      $sql->select("DELETE FROM " . self::TABLE . " WHERE  id = :ID", array(
        ':ID' => $id
      ));
    }

    public function Atualizar($id){
      $sql = new Sql();
      $sql->select("UPDATE " . self::TABLE . " SET nome = :NOME, valor = :VALOR, qtd = :QTD WHERE id = :ID", array(
        ':NOME' => $this->getNome(),
        ':VALOR' => $this->getValor(),
        ':QTD' => $this->getQtd(),
        ':ID' => $id
      ));
    }
  }

?>