<?php


class Order{
	private $total;
	
	function __construct($total){
		$this->total = $total;
	}
	function getTotal(){
		return $this->total;
	}

}
?>