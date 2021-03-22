<?php

class Affiliate{
	private $name;
	private $balance;
	private $upperAffiliate;
	private $subAffiliates;
	private $customer;

	function __construct($name, $balance = 0){
		$this->name = $name;
		$this->balance = $balance;
	}

	function setBalance($balance){
		$this->balance = $balance;
	}
	function setUpperAffiliate($upperAffiliate){
		$this->upperAffiliate = $upperAffiliate;
	}
	function setSubAffiliates($subAffiliates){
		$this->subAffiliates = $subAffiliates;
	}
	function setCustomer($customer){
		$this->customer = $customer;
	}

	function getName(){
		return $this->name;
	}
	function getBalance(){
		return $this->balance;
	}
	function getUpperAffiliate(){
		return $this->upperAffiliate;
	}
	function getSubAffiliates(){
		return $this->subAffiliates;
	}
	function getCustomer(){
		return $this->customer;
	}
	//Gioi thieu nguoi khac den cua hang
	function refer($object){
		if($object instanceof Affiliate){
			$this->subAffiliates[] = $object;
			// echo $this->name." -refer- ".$object->getName()."<br>";
			return;
		}
		if($object instanceof Customer){
			$this->customer[] = $object;
			// echo $this->name." -refer- ".$object->getName()."<br>";*
			return;
		}

	}
	//rut tien, neu balance < 100$ thi ko rut duoc
	function withdraw($money){
		// echo $money;
		// echo "----";
		// echo $this->getBalance();
		// die();
		if($money < 100){
			echo "So tien < 100 khong the rut";
		}else if($this->getBalance() >= $money){
				$this->setBalance($this->getBalance() - $money);
				echo "Rut thanh cong!"."Con lai:".$this->getBalance();
			}else{
				echo "Khong du tien";
			}
	}
	//in danh sach cac affiliate dc gioi thieu
	function printSubAff(){
		foreach ($this->subAffiliates as $key => $value) {
			echo "<pre>";
			echo $value->getName().": &emsp;".$value->getBalance();
			echo "</pre>";
		}
	}
	//danh sach customer ma doi tuong nay gioi thieu mua hang
	function printCustomers(){
		echo $this->name."--".$this->balance;
	}
}
?>