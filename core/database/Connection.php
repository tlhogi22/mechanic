<?php
class Connection{
 
  private $pdo;
  private $error;
  
  public function __construct($config){
      //dsn for mysql
       $dsn = $config['connection'].';'.'dbname='.$config['name'];

    
    try{
      $this->pdo = new PDO(
       $dsn,
        $config['username'],
        $config['password'],
        $config['options']
      );
     
    }
    //catch any errors
    catch (PDOException $e){
        $this->error = $e->getMessage();
        echo $this->error;
    }
    
  }

  public function getConnect(){
    return $this->pdo;
  }

}