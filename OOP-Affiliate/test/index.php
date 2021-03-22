<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Programming Test</title>
	<link rel="stylesheet" href="">
</head>
<body>
<?php
	require_once 'require.php';

	$moyes = new StoreOwner('Moyes', 0);

	$john = new Affiliate('John', 80, 'John');
	$jimmy = new Affiliate('jimmy', 700, 'John');
	$sarah = new Affiliate('sarah', 1500, 'John');
	$eva = new Affiliate('eva', 220, 'John');
	$henry = new Affiliate('henry', 10, 'John');


//John REFER
	$john->refer($sarah);
	$sarah->setUpperAffiliate($john);

	$john->refer($jimmy);
	$jimmy->setUpperAffiliate($john);

	$john->refer($eva);
	$eva->setUpperAffiliate($john);

	$john->refer($henry);
	$henry->setUpperAffiliate($john);


	$customer1 = new Customer('Customer1','Address1');
	$customer2 = new Customer('Customer2','Address2');
	$customer3 = new Customer('Customer3','Address3');
	$customer4 = new Customer('Customer4','Address4');
	$customer5 = new Customer('Customer5','Address5');
	// $customer6 = new Customer('Customer6','Address6');
//Affiliate Refer
	$john->refer($customer1);
	$customer1->setAffiliate($john);

	$jimmy->refer($customer2);
	$customer2->setAffiliate($jimmy);

	$sarah->refer($customer3);
	$customer3->setAffiliate($sarah);
	
	// $sarah->refer($customer6);
	// $customer6->setAffiliate($sarah);

	$eva->refer($customer4);
	$customer4->setAffiliate($eva);

	$henry->refer($customer5);
	$customer5->setAffiliate($henry);
//John
	// echo "John Refer"."<pre>";
	// print_r($john);
	// echo "</pre>"."<hr>";
//Jimmy
	// echo "Jimmy Refer"."<pre>";
	// print_r($jimmy);
	// echo "</pre>"."<hr>";
//Sarah
	// echo "Sarah Refer"."<pre>";
	// print_r($sarah);
	// echo "</pre>"."<hr>";
//eva
	// echo "eva Refer"."<pre>";
	// print_r($eva);
	// echo "</pre>"."<hr>";
//henry
	// echo "henry Refer"."<pre>";
	// print_r($henry);
	// echo "</pre>"."<hr>";

//Customer ORDER
	// echo "-----------------------------ORDER-----------------------------";

	$oder = new Order(800);

	$customer1->placeOrder($oder, $moyes);
	$customer2->placeOrder($oder, $moyes);
	$customer3->placeOrder($oder, $moyes);
	$customer4->placeOrder($oder, $moyes);
	$customer5->placeOrder($oder, $moyes);
	// $customer6->placeOrder($oder, $moyes);

	// echo "<pre>";
	// print_r($customer2);
	// echo "</pre>";

	echo "<p>-------------Print List Affiliate of John-------------</p>";
	$john->printSubAff();

	echo "<p>------------------John withDraw------------------</p>";

	$john->withDraw(150);
	// $eva->withDraw(150);
	// $sarah->withDraw(250);

	echo "<p>-------------Print Money Store-------------</p>";
	$moyes->printBalance();

	echo "<pre>";
	print_r($john);
	echo "</pre>";

?>
	
</body>
</html>