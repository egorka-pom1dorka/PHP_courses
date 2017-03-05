<!-- <?php header("Content-Type: text/html;charset=UTF-8"); ?> -->
<?php

	// $phone=trim($_GET["phone"]);
	// $exp="/([375\+]{3,4})\s*\-*(\d{2})\-*\s*(\d{2})\-*\s*(\d{2})\-*\s*(\d{3})/";
	// $matches = array();
	// preg_match_all($exp, $phone, $matches);

	// //////////////////////////////////////

	// $adress=trim($_GET["adress"]);
	// $pattern="/([httpswf]{2,5})\:\/\/([A-Za-z0-9]{3,})\.*([a-z]*)\.([a-z]{2,})\/*([A-Za-z0-9\/]*)\/*\?*([\w\=\-\+\&\%]*)\#*(\w*)/";
	// $arr = array();
	// preg_match_all($pattern, $adress, $arr);

	//////////////////////////////////////

	$file=file_get_contents("http://www.anaga.ru/goroda.htm");
	$search="/<td>(.*)<\/td>/Uims";
	$arrayName = array();
	preg_match_all($search, $file, $arrayName);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<!-- <form method="GET">
		<label>
			<span>Write your number</span>
			<input type="tel" name="phone" required="">
		</label>
		<input type="submit">
	</form>
	<pre><?php
		print_r($matches);
	?></pre> -->
	<!-- <form method="GET">
		<label>
			<span>Write URL</span>
			<input type="text" name="adress">
		</label>
		<input type="submit">
	</form>
	<pre><?php
		print_r($arr);
	?></pre> -->
	<xmp><?php print_r($arrayName); ?></xmp>
</body>
</html>
