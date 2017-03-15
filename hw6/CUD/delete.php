<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	$id=intval($_GET['id']);
	$link=mysqli_connect("localhost","user","hedogo51","databuse");
	$data=mysqli_query($link,"DELETE FROM items WHERE id = $id ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="ctyle.css">
</head>
<body>
	
</body>
</html>