<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	$id=intval($_GET['id']);
	$link=mysqli_connect("localhost","user","hedogo51","databuse");
	$data=mysqli_query($link,"SELECT * FROM items WHERE id = $id ");
	$res = array();
	while ($temp = mysqli_fetch_assoc($data)) {
		$res[]=$temp;
	}
	$block="<div>
		<h3>".$res[0]["title"]."</h3>
		<img height='150px' src='{$res[0]["img_url"]}'>
		<p>".$res[0]["weight"]."</p>
		<p>".$res[0]["price"]."</p>
		<p>".$res[0]["description"]."</p>
		</div>";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		echo $block;
	?>
</body>
</html>