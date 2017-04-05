<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	require_once("productModel.php");
	$model = new productModel();
	if ($_POST) {
		$name = $_POST['name'];
		$from = $_POST['from'];
		$to = $_POST['to'];
		if ($name) {
			$query .= " AND name LIKE '%{$name}%' ";
		}
		if ($from) {
			$query .= " AND price>=\"$from\" ";
		}
		if($to){
			$query .= " AND price<=\"$to\" ";
		}
		$products = $model->getProducts($query);
	}
	else{
		$products = $model->getProducts();
	}
	foreach ($products as $key => $val) {
		$content .= "<div><img height='180px' src='{$val->getimg()}'><h3>".$val->getName()."</h3><p>".$val->getprice()."</p><p>".$val->getDescription()."</p></div>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		div{
			margin-left: 20px;
			margin-top: 20px;
			display: inline-block;
			width: 600px;
			border: black 1px solid;
			border-radius: 5px;
		}
		label{
			display: block;
		}
	</style>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<label for=""><span>Name </span><input name='name' type="text"></label>
		<label for=""><span>From </span><input name='from' type="number"></label>
		<label for=""><span>To   </span><input name='to' type="number"></label>
		<input type="submit" value="Search">
	</form>
	<?=$content ?>
</body>
</html>