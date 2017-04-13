<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		div{
			margin-left: 20px;
			margin-top: 20px;
			display: inline-block;
			width: 600px;
			border: black 1px solid;
			border-radius: 5px;
			padding:10px;
		}
		label{
			display: block;
		}
	</style>
</head>
<body>
	<form>
		<label for=""><span>Name </span><input name='name' id="name" type="text"></label>
		<label for=""><span>From </span><input name='from' id="from" type="number"></label>
		<label for=""><span>To   </span><input name='to' id="to" type="number"></label>
		<input type="button" value="Search" id="search">
	</form>
	<section></section>
	<script type="text/javascript" src='jquery-3.2.0.js'></script>
 	<script type="text/javascript" src='script.js'></script>
</body>
</html>