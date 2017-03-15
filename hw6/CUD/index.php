<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php
	$link=mysqli_connect("localhost","user","hedogo51","databuse");
	$data=mysqli_query($link,"SELECT * FROM items");
	$res = array();
	while ($temp = mysqli_fetch_assoc($data)) {
		$res[]=$temp;
	}
	for ($i=0; $i < count($res); $i++) { 
		$block.="<div>
		<h3>".$res[$i]["title"]."</h3>
		<img height='150px' src='{$res[$i]["img_url"]}'>
		<p>".$res[$i]["weight"]."</p>
		<p>".$res[$i]["price"]."</p><a href='details.php?id={$res[$i]["id"]}'>Детали</a>
		</div>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
		echo $block;
	?><br><br>
	<button><a href="create.php">Create new item</a></button><br><br>
	<button><a href="create.php">Update or Delete item</a></button>
</body>
</html>
