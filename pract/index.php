<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	require_once("modelArticle.php");
	require_once("modelCategory.php");
	$artModel = new ArticleModel();
	$content="";
	$popularArticle = $artModel->getSortArticles();
	$tags = array();
	$categories = array();

	for ($i=0; $i < count($popularArticle); $i++) { 
		foreach ($artModel->getTags($popularArticle[$i]) as $key => $value) {
			$tags[] = $value;
			$t = implode("; ", $tags);
		}
		foreach ($artModel->getCat($popularArticle[$i]) as $key => $value) {
			$categories[] = $value;
			$c = implode("; ", $categories);
		}
		$content .= "<div><img height='180px' src='{$popularArticle[$i]->getimg()}'><h3>".$popularArticle[$i]->getName()."</h3><p>".$popularArticle[$i]->getContent()."</p><p>".$c."</p><p>".$t."</p><p>".$popularArticle[$i]->getViews()."</p></div>";
		$tags = array();
		$categories = array();
	}

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?=$content ?>
</body>
</html>