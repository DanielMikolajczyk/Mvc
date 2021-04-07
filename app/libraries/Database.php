<?php

class Database
{
  private $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
  private $dbUser = DB_USER;
  private $dbPassword = DB_PASS;
  private $dbOptions = [
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ];

  private $statement;
  private $handler;
  private $error;

  public function __construct()
  {
    try
    {
      $this->handler = new PDO($this->dsn,$this->dbUser,$this->dbPassword,$this->dbOptions);
    }catch(PDOException $e){
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }

  //Prepare sql
  public function query($sql)
  {
    $this->statement = $this->handler->prepare($sql);
  }

  //Bind values
  public function bind($parameter,$value,$type = null)
  {
    switch(is_null($type))
    {
      case is_int($value):
        $type = PDO::PARAM_INT;
        break;
      case is_bool($value):
        $type = PDO::PARAM_BOOL;
        break;
      case is_null($value):
        $type = PDO::PARAM_NULL;
        break;
      default:
        $type = PDO::PARAM_STR;
    }
    $this->statement->bindValue($parameter,$value,$type);
  }

  //Execute sql
  public function execute()
  {
    return $this->statement->execute();
  }

  //Return array
  public function resultSet()
  {
    $this->statement->execute();
    return $this->statement->fetchAll(PDO::FETCH_OBJ);
  }

  //Return specific row as object
  public function single()
  {
    $this->statement->execute();
    return $this->statement->fetch(PDO::FETCH_OBJ);
  }

  //Count affected rows
  public function rowCount()
  {
    return $this->statement->rowCount();
  }


}