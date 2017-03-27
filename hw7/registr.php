<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php
	$link=mysqli_connect("localhost","user","hedogo51","databuse");
	if ($_POST["exit"]) {
		$know="display: none;";
		$unknown="display: block;";
		setcookie("user", "", time()-1);
		unset($_COOKIE["user"]);
	}
	elseif ($cook=$_COOKIE["user"]) {
		$know="display: block;";
		$unknown="display: none;";
		$data=mysqli_query($link, "SELECT name FROM users WHERE hash=\"$cook\"");
		$temp=mysqli_fetch_assoc($data);
		$temp=$temp["name"];
		$user="<h1>Welcome, ".$temp."</h1>";
	}
	elseif($_POST["name"]){
		$know="display: none;";
		$unknown="display: block;";
		$error="";
		$name=$_POST["name"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$repeat=$_POST["repeat"];
		$data=mysqli_query($link,"SELECT COUNT(email) AS a FROM users WHERE email=\"$email\"");
		$temp = mysqli_fetch_assoc($data);
		if($password==$repeat && $temp['a']==0){
			$hash=md5($email.time());
			$data=mysqli_query($link, "INSERT INTO users VALUES(default, \"$name\", \"$email\", \"$password\", \"$hash\")");
			$error ="Successfull registration, please refresh the page";
			setcookie("user", $hash, time()+3600*24*365, "/");
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
	<style type="text/css">
		input[name="exit"]{
			display: none;
		}
		.know{
			<?=$know ?>
		}
		.unknown{
			<?=$unknown ?>
		}
	</style>
</head>
<body>
	<section class="know">
		<?=$user ?>
		<form method="POST">
			<input type="text" value="text" name="exit">
			<input type="submit" value="Exit">
		</form>
	</section>
	<section class="unknown">
		<h1>Registration</h1>
		<main>
			<form method="POST">
				<input type="text" name="name" placeholder="Your name and surname" required="">
				<input type="email" name="email" placeholder="Your e-mail" required="">
				<input type="password" name="password" placeholder="Your password" required="">
				<input type="password" name="repeat" placeholder="Repeat password" required="">
				<input type="submit" name="">
			</form><br>
			<?=$error ?>
		</main>
	</section>
</body>
</html>
