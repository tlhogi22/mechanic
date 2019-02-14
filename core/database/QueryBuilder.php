<?php

class QueryBuilder{
	
	protected $pdo;
	protected $stmt;

    
	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function selectQuery($table,$cols,$conditions,$parameters){
		try{			
			$sql = 'SELECT '.implode(", ", $cols). ' FROM '.implode(", ", $table);

			if ($conditions)
			{
				$sql .= " WHERE ".implode(" AND ", $conditions);
			}
			//echo $sql;
			$this->stmt = $this->pdo->prepare($sql);
			foreach ($parameters as $param => $value) {
				 $this->bind($param, $value);

			}
			
			$this->stmt->execute();


			return  $this->stmt->fetchAll(PDO::FETCH_ASSOC);

			
		}catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function insertQuery($table,$cols,$conditions){
		
		try{
		$key = array_keys($cols);
		
	    $sql = "INSERT INTO ".$table."(".implode(', ', $key).") VALUES( :".implode(', :', $key).")";
		
		// a smart code to add all conditions, if any
		if ($conditions)
		{
			$sql .= " WHERE ".implode(" AND ", $conditions);
		}
		
		$this->stmt = $this->pdo->prepare($sql);
		foreach ($cols as $param => $value) {
			$this->bind(':'.$param, $value);
		}
		$this->stmt->execute($cols);
		


		}	catch (PDOException $e) {
			$e->getMessage();
		}
	}


	public function updateQuery($table,$cols,$conditions, $parameters){
		// the main query
		try{
			$keys = array_keys($cols);
			$set = "";
			foreach ($keys as $key) {
				$set .=  $key.'=:'.$key.',';
			}
			$set = substr($set, 0, -1);

			$sql = "UPDATE $table SET " . $set;
			if ($conditions)
			{
				$sql .= " WHERE ".implode(" AND ", $conditions);
			}
			
			$cols = array_merge($cols, $parameters);
			
			$this->stmt = $this->pdo->prepare($sql);
			$this->stmt->execute($cols);
		}catch (PDOException $e) {
			echo $e->getMessage();
		}

	}
	

	public function bind($param, $value, $type = null){
    	if(is_null($type)){
          switch (true){
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
    	}
    	
    	 $this->stmt->bindValue($param, $value, $type);
  	}


	public function rowCount(){
		return $this->stmt->rowCount();
	}

	public function storedProcedureQuery($cols,$procedure){
		
		try{
		for ($i=0; $i < sizeof($cols); $i++) { 
			$params[$i] = '?';
		}

		$sql = "call ".$procedure."(".implode(', ', $params).")";
		
		$this->stmt = $this->pdo->prepare($sql);

			foreach ($cols as $col => &$value) {
				
				$t= $col + 1;
			    $type = $this->getParamType($value);
				$this->stmt->bindParam($t,$value,$type);

			}
				$this->stmt->execute();
			}catch (PDOException $e) {
			$e->getMessage();
		}

	}

	public function &getParamType($value){
    	static $result;
          switch (true){
              case is_int($value):
               $result = PDO::PARAM_INT;
                return $result;
                break;
              case is_bool($value):
              	  $result = PDO::PARAM_BOOL;
                  return $result;
                  break;
              case is_null($value):
              	  $result = PDO::PARAM_NULL;
                  return $result;
                  break;
              default:
              	  $result = PDO::PARAM_STR;
                  return $result;
          }
    	
  	}
	

}



