<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php
	$file=file_get_contents("data.csv");
	$stroki=explode("\n", $file);
	$kol_strok=count($stroki);
	for($i=0; $i<$kol_strok; $i++){
		$data[$i]=explode(";", $stroki[$i]);
	}
	$arrHead=array_shift($data);
	$kol_strok--;
	for($i=0; $i<$kol_strok; $i++){
		for($j=0; $j<6; $j++){
			$people[$i]["name"]=$data[$i][0];
			$people[$i]["job"]=$data[$i][1];
			$people[$i]["city"]=$data[$i][2];
			$people[$i]["age"]=$data[$i][3];
			$people[$i]["children"]=$data[$i][4];
			$people[$i]["balance"]=$data[$i][5];
		}
	}
	$profes=$_GET["prof"];
	$ageStart=$_GET["ageF"];
	$ageEnd=$_GET["ageT"];
	$balStart=$_GET["balF"];
	$balEnd=$_GET["balT"];
	$find = array();
	for ($i=0; $i < $kol_strok; $i++) { 
		if ($profes!="") {
			if($profes==$people[$i]["job"] && $ageStart<=$people[$i]["age"] && $ageEnd>=$people[$i]["age"] && $balStart<=$people[$i]["balance"] && $balEnd>=$people[$i]["balance"])
				$find[]=$people[$i]["name"];
		}
		else{
			if($ageStart<=$people[$i]["age"] && $ageEnd>=$people[$i]["age"] && $balStart<=$people[$i]["balance"] && $balEnd>=$people[$i]["balance"])
				$find[]=$people[$i]["name"];	
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form>
		<label>
			<span>Profession: </span>
			<input type="text" name="prof">
		</label>
		<label>
			<span>Age from: </span>
			<input type="number" name="ageF" required="">
		</label>
		<label>
			<span>Age to: </span>
			<input type="number" name="ageT" required="">
		</label>
		<label>
			<span>Balance from: </span>
			<input type="number" name="balF" required="">
		</label>
		<label>
			<span>Age to: </span>
			<input type="number" name="balT" required="">
		</label>
		<input type="submit">
	</form>
	<pre><?php print_r($find) ?></pre>
</body>
</html>
