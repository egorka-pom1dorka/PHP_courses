<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php
	if (isset($_GET["phone"])) {
		$phone=trim($_GET["phone"]);
		$exp="/(\+?375)\s*\-*(\d{2})\-*\s*(\d{2,3})\-*\s*(\d{2})\-*\s*(\d{2,3})/";
		$matches = array();
		preg_match_all($exp, $phone, $matches);
		echo $matches[1][0]."-".$matches[2][0]."-".$matches[3][0]."-".$matches[4][0]."-".$matches[5][0];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="GET">
		<label>
			<span>Write your number</span>
			<input type="tel" name="phone" required="">
		</label>
		<input type="submit">
	</form>
</body>
</html>
