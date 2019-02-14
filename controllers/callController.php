<?php
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';

class callController{
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
	
	public function addressexists($idno){
		$this->table = array('tbl_address');
		$this->cols = array('*');
		$this->conditions =  array('u_id = :u_id');
		$this->parameters = array(':u_id' => $idno);
		$address = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $address;
	}
	
	public function getUser($idno){
		$this->table = array('user u','user_role ur');
		$this->cols = array('*');
		$this->conditions =  array('ur.user_id =  u.user_id','u.user_id = :u_id');
		$this->parameters = array(':u_id' => $idno);
		$address_Id = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		
		return $address_Id;
	}	
	
	public function getAllUsers(){
		$this->table = array('user u','user_role ur');
		$this->cols = array('Distinct *');
		$this->conditions =  array('ur.user_id =  u.user_id','role_id = 1');
		$this->parameters = array();
		$userArray = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		
		return $userArray;
	}	
	
	public function getAllMechanics(){
		$this->table = array('tbl_mechanic m','user_role ur');
		$this->cols = array('Distinct *');
		$this->conditions =  array('ur.m_id =  m.m_id','role_id = 2');
		$this->parameters = array();
		$userArray = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		
		return $userArray;
	}
	
	public function getMechanic($idno){
		$this->table = array('tbl_mechanic m','user_role ur');
		$this->cols = array('*');
		$this->conditions =  array('ur.m_id =  m.m_id','m.m_id = :u_id');
		$this->parameters = array(':u_id' => $idno);
		$machenic = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);		
	
	return $machenic;
	}
	
	public function getaddressId($idno){
		$this->table = array('tbl_address');
		$this->cols = array('a_id');
		$this->conditions =  array('u_id = :u_id');
		$this->parameters = array(':u_id' => $idno);
		$address_Id = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $address_Id;
	}	
	
	public function getLogsbyStatus($status){
		$this->table = array('tbl_call c','tbl_status s','tbl_mechanic m','user u' );
		$this->cols = array('Distinct c_description','date_created','status_name','coalesce(concat(m.m_name," ",m.m_surname),"To be assigned") as "tech"','coalesce(date_attended,"To be attended") as "date"');
		$this->conditions =  array('m.m_id = c.m_id','s.status_id = c.c_status','u.user_id = c.u_id','c.c_status = :status');
		$this->parameters = array(':status' => $status);
		$logs = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $logs;
	}
	
	public function getAllLogs(){
		$this->table = array('tbl_call c','tbl_status s','tbl_mechanic m','user u' );
		$this->cols = array('Distinct c_description','date_created','status_name','coalesce(concat(m.m_name," ",m.m_surname),"To be assigned") as "tech"','coalesce(date_attended,"To be attended") as "date"');
		$this->conditions =  array('m.m_id = c.m_id','s.status_id = c.c_status','u.user_id = c.u_id');
		$this->parameters = array();
		$allLogs = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $allLogs;
	}
		
	public function getLogHistory($idno){
		$this->table = array('tbl_call c','tbl_status s','tbl_mechanic m','user u' );
		$this->cols = array('Distinct c_description','date_created','status_name','coalesce(concat(m.m_name," ",m.m_surname),"To be assigned") as "tech"','coalesce(date_attended,"To be attended") as "date"');
		$this->conditions =  array('m.m_id = c.m_id','s.status_id = c.c_status','u.user_id = c.u_id','u.user_id = :u_id');
		$this->parameters = array(':u_id' => $idno);
		$address_Id = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $address_Id;
	}	
	
	public function getStatus(){
		$this->table = array('tbl_status');
		$this->cols = array('*');
		$this->conditions =  array();
		$this->parameters = array();
		$allLogs = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $allLogs;
	}
	public function sortByCity($city){
		$this->table = array('tbl_address a','tbl_mechanic m','user_role ur');
		$this->cols = array('Distinct m_name','m.m_id','m_phone','street','city','state','zipcode');
		$this->conditions =  array('m.m_id = a.u_id','m.m_id = ur.m_id','role_id = 2','city = :city');
		$this->parameters = array(':city' => $city);
		$list = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $list;
	}
	
	public function sortByProvince($province){
		$this->table = array('tbl_address a','tbl_mechanic m','user_role ur');
		$this->cols = array('Distinct m_name','m.m_id','m_phone','street','city','state','zipcode');
		$this->conditions =  array('m.m_id = a.u_id','m.m_id = ur.m_id','role_id = 2','state = :state');
		$this->parameters = array(':state' => $province);
		$list = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $list;
	}
		
	public function sortByZip($zip){
		$this->table = array('tbl_address a','tbl_mechanic m','user_role ur');
		$this->cols = array('Distinct m_name','m.m_id','m_phone','street','city','state','zipcode');
		$this->conditions =  array('m.m_id = a.u_id','m.m_id = ur.m_id','role_id = 2','zipcode = :zipcode');
		$this->parameters = array(':zipcode' => $zip);
		$list = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $list;
	}	
	
	public function getLocation(){
		$this->table = array('tbl_location');
		$this->cols = array('*');
		$this->conditions =  array('id = (SELECT MAX(id) FROM tbl_location)');
		$this->parameters = array();
		$list = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		return $list;
	}
	
	public function createCall($id,$street, $city, $province, $zip, $description,$email,$name){
			$address = $this->addressexists($id);

			if(empty($address)){
				$this->createAddress($id,$street, $city, $province, $zip);
				$addID = $this->getaddressId($id);
				$addressID = $addID[0]['a_id'];
			}else{
				$addressID = $address[0]['a_id'];
			}		 
			$status = 1;
			
			$this->table = 'tbl_call';
			$this->conditions =  array();
			$this->cols = array('u_id' => $id,'c_description' => $description, 'c_addrss_id' => $addressID , 'c_status' => $status);
			$this->queryObject->insertQuery($this->table,$this->cols,$this->conditions);
			
		if($this->queryObject->rowCount()){	
			$this->msg = "Successfully added";
			return "success";
		}else{
			$this->msg = "Log unsuccessful";
			return "danger";
		}

	}	
	
	public function createRequest($id,$description,$m_id){
			$address = $this->addressexists($id);		
			$addressID = null;//$address[0]['a_id'];
			$status = 1;
			
			$this->table = 'tbl_call';
			$this->conditions =  array();
			$this->cols = array('u_id' => $id,'c_description' => $description, 'c_addrss_id' => $addressID , 'c_status' => $status, 'm_id' => $m_id);
			$this->queryObject->insertQuery($this->table,$this->cols,$this->conditions);
			
		if($this->queryObject->rowCount()){	
			$this->msg = "Successfully added";
			return "success";
		}else{
			$this->msg = "Log unsuccessful";
			return "danger";
		}
	}
	public function createAddress($id,$street, $city, $province, $zip){
			$this->table = 'tbl_address';
			$this->conditions =  array();
			$this->cols = array('street' => $street,'city' => $city,'state' => $province,'zipcode' => $zip, 'u_id' => $id);
			$this->queryObject->insertQuery($this->table,$this->cols,$this->conditions);

	}	
	
	public function storeLocation($id,$street, $city, $province, $zip){
			$this->table = 'tbl_location';
			$this->conditions =  array();
			$this->cols = array('street' => $street,'city' => $city,'province' => $province,'zip' => $zip,'u_id' => $id);
			$this->queryObject->insertQuery($this->table,$this->cols,$this->conditions);

	}
	public function updateCitizen($idno,$firstname,$lastname, $email, $phone){
		
		$this->table = 'user';
		$this->cols = array('u_name' => $firstname,'u_surname' => $lastname,'u_email' => $email ,'u_phone' => $phone);
		$this->conditions =  array('user_id = :user_id');
		$this->parameters = array('user_id' => $idno);
		$this->queryObject->updateQuery($this->table,$this->cols,$this->conditions, $this->parameters);
		
		if($this->queryObject->rowCount()){	
			$this->msg = "Successfully updated";
			return "success";
		}else{
			$this->msg = "Unsuccessful";
			return "danger";
		}
	}
	
		public function updateMechanic($idno,$firstname,$lastname, $email, $phone){
		
		$this->table = 'tbl_mechanic';
		$this->cols = array('m_name' => $firstname,'m_surname' => $lastname,'m_email' => $email ,'m_phone' => $phone);
		$this->conditions =  array('m_id = :m_id');
		$this->parameters = array(':m_id' => $idno);
		$this->queryObject->updateQuery($this->table,$this->cols,$this->conditions, $this->parameters);
		
		if($this->queryObject->rowCount()){	
			$this->msg = "Successfully updated";
			return "success";
		}else{
			$this->msg = "Unsuccessful";
			return "danger";
		}
	}
	
	public function updateAddress($id,$street, $city, $province, $zip){
		
		$this->table = 'tbl_address';
		$this->cols = array('street' => $street,'city' => $city,'state' => $province,'zipcode' => $zip);
		$this->conditions =  array('u_id = :u_id');
		$this->parameters = array('u_id' => $id);
		$this->queryObject->updateQuery($this->table,$this->cols,$this->conditions, $this->parameters);
		
		if($this->queryObject->rowCount()){	
			$this->msg = "Successfully updated";
			return "success";
		}else{
			$this->msg = "Unsuccessful";
			return "danger";
		}
	}	
	
	public function updateUserStatus($u_id){
		
		$this->table = 'user';
		$this->cols = array('status' => 0);
		$this->conditions =  array('user_id = :user_id');
		$this->parameters = array('user_id' => $u_id);
		$this->queryObject->updateQuery($this->table,$this->cols,$this->conditions, $this->parameters);
		
	}	
	
	public function updateMechanicStatus($u_id,$status){
		
		$this->table = 'tbl_mechanic';
		$this->cols = array('status' => $status);
		$this->conditions =  array('m_id = :user_id');
		$this->parameters = array('user_id' => $u_id);
		$this->queryObject->updateQuery($this->table,$this->cols,$this->conditions, $this->parameters);
		
	}

}
