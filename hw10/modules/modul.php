<?php 
	require_once("../productModel.php");
	$model = new productModel();

	$query="";
	if ($_GET) {
		$name = $_GET['name'];
		$from = $_GET['from'];
		$to = $_GET['to'];

		if ($name) {
			$query .= " AND name LIKE '%{$name}%'";
		}
		if ($from) {
			$query .= " AND price>=$from";
		}
		if($to){
			$query .= " AND price<=$to";
		}
		
	}
	$products = $model->getProducts($query);
	$arr = array();

	foreach ($products as $key => $val) {
		$arr[] = array(
			"img" => $val->getImg(), 
			"name" =>$val->getName(),
			"price" =>$val->getPrice(),
			"desc" =>$val->getDescription()
			);
	}
	echo json_encode($arr);
?>