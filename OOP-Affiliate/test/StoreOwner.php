<?php

class StoreOwner{
	private $name;
	private $balance;
	function __construct($name,$balance = 0){
		$this->name = $name;
		$this->balance = $balance;
	}

	function printBalance(){
		echo $this->balance;
	}
	function setBalance($balance){
		$this->balance = $balance;
	}
	function getBalance(){
		return $this->balance;
	}

}


?>