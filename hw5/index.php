<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php
	// if (isset($_GET["phone"])) {
	// 	$phone=trim($_GET["phone"]);
	// 	$exp="/(\+?375)\s*\-*(\d{2})\-*\s*(\d{2,3})\-*\s*(\d{2})\-*\s*(\d{2,3})/";
	// 	$matches = array();
	// 	preg_match_all($exp, $phone, $matches);
	// 	echo $matches[1][0]."-".$matches[2][0]."-".$matches[3][0]."-".$matches[4][0]."-".$matches[5][0];
	// }

	// //////////////////////////////////////

	if (isset($_GET["adress"])) {
		$adress=trim($_GET["adress"]);
		$pattern="/(http|https|ws|ftp)\:\/\/([A-Za-z0-9]{3,})\.*([a-z]*)\.([a-z]{2,})\/*([A-Za-z0-9\/]*)\/*\?*([\w\=\-\+\&\%]*)\#*(\w*)/";
		$arr = array();
		preg_match_all($pattern, $adress, $arr);
		if ($arr[1][0]!=NULL) {
			echo Yes;
		}
		else echo No;
	}

	// //////////////////////////////////////

	// $file=file_get_contents("http://www.anaga.ru/goroda.htm");
	// $search="/<td>(.*)<\/td>/Uims";
	// $arrayName = array();
	// preg_match_all($search, $file, $arrayName);

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
	</form> -->
	<form method="GET">
		<label>
			<span>Write URL</span>
			<input type="text" name="adress">
		</label>
		<input type="submit">
	</form>
	<!-- <xmp><?php print_r($arrayName); ?></xmp> -->
</body>
</html>
