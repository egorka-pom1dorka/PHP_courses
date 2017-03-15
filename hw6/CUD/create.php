<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	if (isset($_POST["title"])) {
		$title=$_POST["title"];
		$img=$_POST["img"];
		$weight=$_POST["weight"];
		$price=$_POST["price"];
		$description=$_POST["description"];
		$link=mysqli_connect("localhost","user","hedogo51","databuse");
		$data=mysqli_query($link,"INSERT INTO items VALUES(default,\"$title\",\"$price\",\"$weight\",\"$img\",\"$description\")");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="ctyle.css">
</head>
<body>
	<form method="POST" enctype="multipart/form-data" multiple="multiple" class="add">
		<label for=""><span>Write item title</span><input type="text" name="title" required=""></label><br>
		<label for=""><span>Write URL image</span><input type="text" name="img" required=""></label><br>
		<label for=""><span>Write weight</span><input type="number" name="weight" required=""></label><br>
		<label for=""><span>Write price</span><input type="number" name="price" required=""></label><br>
		<label for=""><span>Write description</span><input type="text" name="description" required=""></label><br>
		<input type="submit">
	</form>
</body>
</html>