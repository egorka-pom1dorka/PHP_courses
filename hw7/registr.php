<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php
	if($_POST["name"]){
		$error="";
		$name=$_POST["name"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$repeat=$_POST["repeat"];
		$link=mysqli_connect("localhost","user","hedogo51","databuse");
		$data=mysqli_query($link,"SELECT COUNT(email) FROM users WHERE email=\"$email\"");
		$temp = mysqli_fetch_assoc($data);
		if($password==$repeat && $temp===0){
			$hash=md5($password);
			$data=mysqli_query($link, "INSERT INTO users VALUES(default, \"$name\", \"$email\", \"$password\", \"$hash\")");
		}
		else{
			 $error="Error, please check the entered data";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Registration</h1>
	<main>
		<form method="POST">
			<input type="text" name="name" placeholder="Your name and surname" required="">
			<input type="email" name="email" placeholder="Your e-mail" required="">
			<input type="password" name="password" placeholder="Your password" required="">
			<input type="password" name="repeat" placeholder="Repeat password" required="">
			<input type="submit" name="">
		</form><br>
		<?php echo $error ?>
	</main>
</body>
</html>
