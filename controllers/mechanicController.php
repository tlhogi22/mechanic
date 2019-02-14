<?php
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';



class mechanicController
{
	protected $queryObject;
	protected $pdo;
	protected $conditions;
	protected $table;
	protected $con;
	protected $config;
	protected $cols;
	public $msg;

	public function __construct(){
		$this->config = require 'core/config.php';
		$this->con = new Connection($this->config);
		$this->pdo = $this->con->getConnect();
		$this->queryObject = new QueryBuilder($this->pdo);
	}

	public function getLog($user_Id ){
		$this->table = array('tbl_call c','tbl_location l','user u');
		$this->cols = array('Distinct c_id','u_name','u_surname','date_created', 'c_description', 'c_status','id', 'street', 'city', 'province', 'zip');
		$this->conditions =  array('c.u_id = u.user_Id','u.user_id = l.u_id','c.m_id = :u_id');
		$this->parameters = array(':u_id' => $user_Id);
		$log = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $log;
	}

	public function getStatusName($status_id){
		$this->table = array('tbl_status');
		$this->cols = array('status_name');
		$this->conditions =  array("status_id = :status_id");
		$this->parameters = array(':status_id' => $status_id);
		$status_name = $this->queryObject->selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $status_name;	
	}

	 public function getUser($user_id){
		$this->table = array('user');
		$this->cols = array('*');
		$this->conditions =  array('user_id = :u_id');
		$this->parameters = array(':u_id' => $user_id);
		$user = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $user;
	}	 
	
	public function closeCall($call_id){
		 
		$this->table = 'tbl_call';
		$this->cols = array('c_status' => 3);
		$this->conditions =  array('c_id = :c_id');
		$this->parameters = array('c_id' => $call_id);
		$this->queryObject->updateQuery($this->table,$this->cols,$this->conditions, $this->parameters);
		
		if($this->queryObject->rowCount()){	
			$this->msg = "Successfully updated";
			return "success";
		}else{
			$this->msg = "Unsuccessful";
			return "danger";
		}
	}
	
	public function updateCallStatus($call_id){
		$dateTimeVariable = date("Y-m-d H:i:s");
		
		$this->table = 'tbl_call';
		$this->cols = array('c_status' => 2,'date_attended'=> $dateTimeVariable);
		$this->conditions =  array('c_id = :c_id');
		$this->parameters = array('c_id' => $call_id);
		$this->queryObject->updateQuery($this->table,$this->cols,$this->conditions, $this->parameters);
		
		if($this->queryObject->rowCount()){	
			$this->msg = "Successfully updated";
			return "success";
		}else{
			$this->msg = "Unsuccessful";
			return "danger";
		}
	}
}