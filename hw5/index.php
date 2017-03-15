<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php

	if (isset($_GET["adress"])) {
		$adress=trim($_GET["adress"]);
		$pattern="/(http|https|ws|ftp)\:\/\/([A-Za-z0-9]{2,})\.*([a-z]*)\.([a-z]{2,})\/*([A-Za-z0-9\/]*)\/*\?*([\w\=\-\+\&\%]*)\#*(\w*)/";
		$arr = array();
		preg_match_all($pattern, $adress, $arr);
		if ($arr[1][0]!=NULL) {
			echo Yes;
		}
		else echo No;
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
			<span>Write URL</span>
			<input type="text" name="adress">
		</label>
		<input type="submit">
	</form>
</body>
</html>
