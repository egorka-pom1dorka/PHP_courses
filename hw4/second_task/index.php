<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php
	
	if(isset($_POST['name'])){
		$people = array();
		$form="";
		$nick=$_POST["name"];
		$comment=$_POST["comment"];
		$Loc=$_FILES["file"]["tmp_name"];
		$fileName=$_FILES["file"]["name"];
		$time=date("d F Y H:i");

		/////////////////Проверка файла
		$fileLoc="files/".$fileName;
		$info=pathinfo($fileLoc);
		$type=$info["extension"];
		if ($type!= "png" && $type!="jpeg" && $type!="jpg" && $typr!="jpe") {
			echo "Отправленый файл не является картинкой";
		}
		else{

			/////////////////Запись данных в файл
			$mas=array($nick, $time, $comment, $fileLoc);
			$arr=implode(";", $mas);

			/////////////////Wrong
			// $size=1;
			// foreach ($people as $key => $value) {
			// 	if ($fileName==$value) {
			// 		$info=pathinfo($fileName);
			// 		$onlyName=$info["filename"];
			// 		rename($onlyName, $onlyName.$size);
			// 		$size++;
			// 		$fileName=$onlyName;
			// 	}
			// }

			file_put_contents("file.csv", $arr."\n", FILE_APPEND);

			copy($Loc, "files/".$fileName);
		}
	}

	/////////////////Формирование массива данных
	$file=file_get_contents("file.csv");
	$rows=explode("\n", $file);
	$k=count($rows)-1;
	for ($i=0; $i < $k; $i++) {
		$data[$i]=explode(";", $rows[$i]);
	}
	for ($i=0; $i < $k; $i++) { 
		for ($j=0; $j < 4; $j++) { 
		$people[$i]["name"]=$data[$i][0];
		$people[$i]["time"]=$data[$i][1];
		$people[$i]["comment"]=$data[$i][2];
		$people[$i]["located"]=$data[$i][3];	
		}
	}

	/////////////////Вавод отзывов
	for ($i=0; $i < $k; $i++) { 
		$form.="<fieldset><img src='{$people[$i]['located']}' />"."<span>".$people[$i]["name"]."</span><br>"."<span>".$people[$i]["time"]."</span><br>"."<span>".$people[$i]["comment"]."</span></fieldset>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<label>
			<p>Choose avatar: </p>
			<input type="file" name="file" required="">
		</label><br>
		<label>
			<p>Name: </p>
			<input type="text" name="name" required="">
		</label><br>
		<label>
			<p>Comment: </p>
			<textarea name="comment" rows="5" cols="45"></textarea>
		</label><br>
		<input type="submit">
	</form>
	<?php
		echo $form;
	?>
</body>
</html>
 