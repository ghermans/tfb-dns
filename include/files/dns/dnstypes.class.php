<?php
class DNSTypes{
	var $typesByID = array();
	var $typesByName = array();
	
	public function __construct(){
		$this->addType(1, "ANY");
		$this->addType(2, "A");
		$this->addType(5, "CNAME");
		$this->addType(6, "SOA");
		$this->addType(15, "MX");
		$this->addType(255, "NS");
	}
	
	private function addType($id, $name){
		$this->typesByID[$id] = $name;
		$this->typesByName[$name] = $id;
	}
	
	public function getByName($name){
		if (isset($this->typesByName[$name])){
			return $this->typesByName[$name];
		}else{
			return false;
		}
	}
	
	public function getByID($id){
		if (isset($this->typesByID[$id])){
			return $this->typesByID[$id];
		}else{
			return false;
		}
	}
}