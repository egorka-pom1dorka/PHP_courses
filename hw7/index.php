<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Awesome service</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
		<button><a href="registr.php">Create a new account</a></button>
	</main>
</body>
</html>
