<?php header("Content-Type: text/html;charset=UTF-8");?>
<?php
	$path="D:\GamesMailRu";
	function Output($x){
		$dir = opendir($x);
		$read=array();
		chdir($x);
		while ($var=readdir($dir)){
			$read[]=$var;		
			if(is_dir($var) && $var!="." && $var!=".."){
				$read[$var]=Output($var);
				chdir("..");
			}
			elseif (is_file($var)) {
				$read[]=$var;
			}
		}
		closedir($dir);
		return $read;
	}

	function Size($x){
		$sum=0;
		$dir = opendir($x);
		chdir($x);
		while ($var=readdir($dir)){	
			if(is_dir($var) && $var!="." && $var!=".."){
				$sum+=Size($var);
				chdir("..");
			}
			elseif (is_file($var)) { 
				$sum+=filesize($var);
			}
		}
		closedir($dir);
		return $sum;
	}

	function Delete($x){
		$dir = opendir($x);
		chdir($x);
		while ($var=readdir($dir)){	
			if(is_dir($var) && $var!="." && $var!=".."){
				Delete($var);
			}
			elseif (is_file($var)){ 
				unlink($var);
			}
		}
		chdir("..");
		closedir($dir);
		rmdir($x);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>NewSite</title>
	</head>
	<body>
		<pre><?php 
			
		?></pre>
	</body>
</html>