<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	$id=intval($_GET['id']);
	$link=mysqli_connect("localhost","user","hedogo51","databuse");
	$title=$_POST["title"];
	$img=$_POST["img"];
	$weight=$_POST["weight"];
	$price=$_POST["price"];
	$description=$_POST["description"];
	if($title==NULL) $title=mysqli_query($link,"SELECT title WHERE id=$id");
	if($img==NULL) $img=mysqli_query($link,"SELECT img_url WHERE id=$id");
	if($weight==NULL) $weight=mysqli_query($link,"SELECT weight WHERE id=$id");
	if($price==NULL) $price=mysqli_query($link,"SELECT price WHERE id=$id");
	if($description==NULL) $description=mysqli_query($link,"SELECT description WHERE id=$id");
	$data=mysqli_query($link,"UPDATE items SET title=\"$title\", price=\"$price\", weight=\"$weight\", img_url=\"$img\", description=\"$description\" WHERE id=$id");
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
		<label for=""><span>Write item title</span><input type="text" name="title"></label><br>
		<label for=""><span>Write URL image</span><input type="text" name="img"></label><br>
		<label for=""><span>Write weight</span><input type="number" name="weight"></label><br>
		<label for=""><span>Write price</span><input type="number" name="price"></label><br>
		<label for=""><span>Write description</span><input type="text" name="description"></label><br>
		<input type="submit">
	</form>
</body>
</html>