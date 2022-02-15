<?php
namespace App\Models;
class Sql {

  const HOSTNAME = "127.0.0.1";
  const USERNAME = "root";
  const PASSWORD = "10sa!@#SA";
  const DBNAME = "dbEcommerce";

  private $con;

  public function __construct(){
    $this->con = new \PDO("mysql:dbname=" . Sql::DBNAME . ";host=" . Sql::HOSTNAME, Sql::USERNAME, Sql::PASSWORD
  );
  }

  private function setParams($statement, $parameters=array()){
    foreach ($parameters as $key => $value){
      $this->setParam($statement, $key, $value);
    }
  }
  private function setParam($statement, $key, $value){
    $statement->bindParam($key, $value);
  }


  public function newQuery($rawQuery, $params=array()){
    $statement = $this->con->prepare($rawQuery);
    $this->setParams($statement, $params);
    $statement->execute();
    return $statement;
  }


  public function select($rawQuery, $params=array()):array{
    $stmt = $this->newQuery($rawQuery, $params);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
}