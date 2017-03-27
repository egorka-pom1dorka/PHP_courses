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
	elseif($_POST["email"]){
		$know="display: none;";
		$unknown="display: block;";
		$error="";
		$email=$_POST["email"];
		$password=$_POST["password"];
		$data=mysqli_query($link,"SELECT password AS a FROM users WHERE email=\"$email\"");
		$temp = mysqli_fetch_assoc($data);
		if($password == $temp['a']){
			$data=mysqli_query($link, "SELECT hash FROM users WHERE email='$email'");
			$hash=mysqli_fetch_assoc($data);
			$hash=$hash["hash"];
			$error ="Success, please refresh the page";
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
	<title>Awesome service</title>
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
		<h1>Welcome in our service</h1>
		<main>
			<p>Come in your account</p>
			<form method="POST">
				<label for="">
					<p>Write e-mail</p><input type="email" name="email" required="">
				</label>
				<label for="">
					<p>Write password</p><input type="password" name="password" required="">
				</label>
				<input type="submit" class="submit">
			</form>
			<p>Don't have an account?</p>
			<button><a href="registr.php">Create a new account</a></button><br>
			<?=$error ?>
		</main>
	</section>
</body>
</html>
