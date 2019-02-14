<?php
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';

class UserController{
	protected $pdo;
	protected $config;
	protected $table;
	protected $conditions;
	protected $cols;
	protected $queryObject;
	protected $conObject;
	public $msg;

	public function __construct(){
		$this->config = require 'core/config.php';
		$this->conObject = new Connection($this->config);
		$this->pdo = $this->conObject->getConnect();
		$this->queryObject = new QueryBuilder($this->pdo);
		$this->msg = "";
	}

	public function login($username, $password){
		
		$user_id ="";
		$user_name = "";
		$column = "";
		
		$this->table = array('user');
		$this->cols = array('*');
		$this->conditions =  array("u_email = :u_email", "password = :password",'status = 1');
		$this->parameters = array(':u_email' => $username, ':password' => $password);

		$user = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		if(!empty($user)){
			$user_id = $user[0]['user_id'];
			$user_name = $user[0]['u_name'].' '.$user[0]['u_surname'];
			$column = 'user_id';
		}else{

			$this->table = array('tbl_mechanic');
			$this->cols = array('*');
			$this->conditions =  array("m_email = :m_email", "m_password = :m_password",'status = 1');
			$this->parameters = array(':m_email' => $username, ':m_password' => $password);
			$user_m = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters); 
				if(!empty($user_m)){
					 $user_id = $user_m[0]['m_id'];
					 $user_name = $user_m[0]['m_name'].' '.$user_m[0]['m_surname'];
					 $column = 'm_id';
				}
		 }
		 
		if($this->queryObject->rowCount()){

			
			$_SESSION['login'] = true;
			$_SESSION['user_id'] = $user_id;
			$_SESSION['user_name'] = $user_name;
			$_SESSION['role_id'] =  $this->getRoleID($user_id,$column);
			
			if($_SESSION['role_id'] == 3){
				header('Location: adminLogs.php');
			}elseif ($_SESSION['role_id'] == 2) {
				header('Location: mechanic.php');
			}else{
				header('Location: index.php');
			}
			
		}else{
			$this->msg = "Invalid username and/or password.";
		}
		return $user;
	}
	
	public function createUserRole($user,$role,$column){
		$this->table = 'user_role';
		$this->conditions =  array();
		$this->cols = array($column => $user,'role_id' => $role);
		$this->queryObject->insertQuery($this->table,$this->cols,$this->conditions);
		
	}
	
	public function createUser($name,$surname,$email,$phone, $password,$kin_name,$kin_phone,
	$kin_email,$status){
		$user = $this->getUserId($email);
		if(empty($user)){
			$this->table = 'user';
			$this->conditions =  array();
			$this->cols = array('u_name' => $name,'u_surname' => $surname, 'u_email' => $email ,
			'u_phone' => $phone, 'password' => $password, 'kin_name' => $kin_name,
			'kin_phone' => $kin_phone,'kin_email' => $kin_email,'status' => $status);
			$this->queryObject->insertQuery($this->table,$this->cols,$this->conditions);
		}else{
			$this->msg = "User exists";
			return "danger";
		}
		if($this->queryObject->rowCount()){	
			$this->msg = "Successfully added";
			return "success";
		}else{
			$this->msg = "Unsuccessful";
			return "danger";
		}
	}
	
	public function createMechanic($name,$surname,$email,$phone, $password,$status){
		$user = $this->getMechanicId($email);
		if(empty($user)){
			$this->table = 'tbl_mechanic';
			$this->conditions =  array();
			$this->cols = array('m_name' => $name,'m_surname' => $surname, 'm_email' => $email ,
			'm_phone' => $phone, 'm_password' => $password,'status' => $status);
			$this->queryObject->insertQuery($this->table,$this->cols,$this->conditions);
		}else{
			$this->msg = "User exists";
			return "danger";
		}
		if($this->queryObject->rowCount()){	
			$this->msg = "Successfully added";
			return "success";
		}else{
			$this->msg = "Unsuccessful";
			return "danger";
		}
	}
	
	public function getUserId($email){		
		$this->table = array('user');
		$this->cols = array('user_id' => 'user_id');
		$this->conditions =  array("u_email = :u_email");
		$this->parameters = array(':u_email' => $email);
		
		$user = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		
		return $user;
	}
	
	public function getMechanicId($email){
		
		$this->table = array('tbl_mechanic');
		$this->cols = array('m_id' => 'm_id');
		$this->conditions =  array("m_email = :u_email");
		$this->parameters = array(':u_email' => $email);
		
		$user = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		
		return $user;
	}
	
	public function createAddress($id,$street, $city, $province, $zip){
			$this->table = 'tbl_address';
			$this->conditions =  array();
			$this->cols = array('street' => $street,'city' => $city,'state' => $province,'zipcode' => $zip, 'u_id' => $id);
			$this->queryObject->insertQuery($this->table,$this->cols,$this->conditions);

	}	
	
	private function getRoleID($user_id,$column){
		$this->table = array('user_role');
		$this->cols = array('role_id' => 'role_id');
		$this->conditions =  array($column.' = :user_id');
		$this->parameters = array(':user_id' => $user_id);
		$role = $this->queryObject->selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);

		$role_id = $role[0]['role_id'];
		return $role_id;
	}
}