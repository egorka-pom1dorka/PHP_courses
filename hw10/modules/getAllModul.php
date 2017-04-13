<?php 
	require_once("../productModel.php");
	$model = new productModel();

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