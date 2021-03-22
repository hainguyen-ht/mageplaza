<?php
class Customer{
	private $name;
	private $address;
	private $affiliate;

	function __construct($name, $address){
		$this->name = $name;
		$this->address = $address;
		
	}
	
	//mua hang
	function placeOrder(Order $order, StoreOwner $storeOwner){
		$percent = 0;
		$getUpperAff = $this->getAffiliate()->getUpperAffiliate();
		
		if($getUpperAff){
			$getUpperAff->setBalance($getUpperAff->getBalance() + $order->getTotal() * 0.05);
			$this->getAffiliate()->setBalance($this->getAffiliate()->getBalance() + $order->getTotal() * 0.1);
			$percent = $order->getTotal() * 0.05 + $order->getTotal() * 0.1;
		}else{
			$this->getAffiliate()->setBalance($this->getAffiliate()->getBalance() + $order->getTotal() * 0.1);
			$percent = $order->getTotal() * 0.1;
		}
		$getSubAff = $this->getAffiliate()->getSubAffiliates();
		
		$storeOwner->setBalance($storeOwner->getBalance() + $order->getTotal() - $percent);
	
		// echo "<pre>";
		// print_r($storeOwner);
		// echo "</pre>"."<hr>";
	}
	
	function getName(){
		return $this->name;
	}
	function setAffiliate($affiliate){
		$this->affiliate = $affiliate;
	}
	function getAffiliate(){
		return $this->affiliate;
	}
}
?>