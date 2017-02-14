<?php header("Content-Type: text/html;charset=UTF-8");?>
<?php 
	$kol=6; $body="<tr></tr>"; $head="<td>"."</td>";
	for($i=1; $i<=$kol; $i++){
		$head=$head."<td>".$i."</td>";
	}
	for($i=1; $i<=$kol; $i++){
		$str="<td>".$i."</td>";
		for($j=1; $j<=$kol; $j++){
			$str=$str."<td>".($i*$j)."</td>";
		}
		$body=$body."<tr>".$str."</tr>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<table>
			<thead><?=$head?></thead>
			<tbody><?=$body?></tbody>
		</table>
	</body>
</html>