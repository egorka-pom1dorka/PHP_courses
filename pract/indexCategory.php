<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	require_once("modelCategory.php");
	require_once("modelArticle.php");
	$url = $_GET['url'];
	$catModel = new CategoryModel();
	$artModel = new ArticleModel();
	$category = $catModel->getCategory($url);
	$articles = $catModel->getArticles($category[0]);
	$content = "";
	$tags = array();

	foreach ($articles as $key => $value) {
		foreach ($artModel->getTags($value) as $k => $v) {
			$tags[] = $v;
			$t = implode("; ", $tags);
		}
		$content .= "<div><img height='180px' src='{$value->getimg()}'><h3>".$value->getName()."</h3><p>".$value->getContent()."</p>".$t."<p>".$value->getViews()."</p></div>";
		$tags = array();
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