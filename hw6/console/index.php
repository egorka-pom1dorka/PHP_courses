<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php
	ini_set('display_errors','Off');
	error_reporting('E_ALL');
	$str=trim($_GET["query"]);
	$check=strtoupper($str);
	$link=mysqli_connect("localhost","user","hedogo51","databuse");
	if(isset($str) && strpos($check, "SELECT") === 0){
		$data=mysqli_query($link,$str);
		$res = array();
		while ($temp = mysqli_fetch_assoc($data)) {
			$res[]=$temp;
		}
		for($i=0; $i<count($res); $i++) {
			foreach ($res[$i] as $key => $value) {
				$head.="<td>".$key."</td>";
			}
			$head="<tr>".$head."</tr>";
			break;
		}
		for ($i=0; $i <count($res) ; $i++) { 
			foreach ($res[$i] as $key => $value) {
				$td.="<td>".$res[$i][$key]."</td>";
			}
			$row.="<tr>".$td."</tr>";
			$td="";
		}
		$table="<table>"."<thead>".$head."</thead>"."<tbody>".$row."</tbody>"."</table>";
	}
	ini_set('display_errors','On');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="">
		<textarea name="query" rows="8" cols="40"></textarea><br>
		<input type="submit">
	</form>
	<?php 
		echo $table;
		echo mysqli_error($link);
	?>
</body>
</html>
