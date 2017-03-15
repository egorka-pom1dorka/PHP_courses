<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php  
	$id=intval($_GET['id']);
	$link=mysqli_connect("localhost","user","hedogo51","databuse");
	$data=mysqli_query($link,"SELECT * FROM items");
	$res = array();
	while ($temp = mysqli_fetch_assoc($data)) {
		$res[]=$temp;
	}
	for($i=0; $i<count($res); $i++) {
		foreach ($res[$i] as $key => $value) {
			$head.="<td>".$key."</td>";
		}
		$head="<tr>".$head."<td>Delete links</td><td>Update links</td></tr>";
		break;
	}
	for ($i=0; $i <count($res) ; $i++) { 
		foreach ($res[$i] as $key => $value) {
			$block="<td>".$res[$i]["id"]."</td>
				<td>".$res[$i]["title"]."</td>
				<td>".$res[$i]["price"]."</td>
				<td>".$res[$i]["weight"]."</td>
				<td>".$res[$i]["img_url"]."</td>
				<td>".$res[$i]["description"]."</td>
				<td><a href=\"delete.php?id={$res[$i]["id"]}'\">Delete</a></td>
				<td><a href=\"update.php?id={$res[$i]["id"]}'\">Update</a></td>";
		}
		$row.="<tr>".$block."</tr>";
		$block="";
	}
	$table="<table>"."<thead>".$head."</thead>"."<tbody>".$row."</tbody>"."</table>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php echo $table; ?>
</body>
</html>