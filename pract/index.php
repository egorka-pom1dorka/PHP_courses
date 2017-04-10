<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	require_once("modelArticle.php");
	require_once("modelCategory.php");
	require_once("modelTag.php");
	$artModel = new ArticleModel();
	$content="";
	$aside = "";
	$popularArticle = $artModel->getSortArticles();
	$tags = array();
	$categories = array();

	//////////////////////////////Контент страницы 
	for ($i=0; $i < count($popularArticle); $i++) { 
		foreach ($artModel->getTags($popularArticle[$i]) as $key => $value) {
			$tags[] = "<a href='/tags/{$value}'>".$value."</a>";
			$t = implode("; ", $tags);
		}
		$c = $artModel->getCat($popularArticle[$i]);
			
		$content .= "<div><img src='{$popularArticle[$i]->getimg()}'><h2><a href='/articles/{$popularArticle[$i]->getUrl()}'>".$popularArticle[$i]->getName()."</a></h2><p>Category: <b><a href='/categories/{$c}'>".$c."</a></b></p><p>Tags: <i>".$t."</i></p><p>Views: ".$popularArticle[$i]->getViews()."</p><p>".$popularArticle[$i]->getDate()."</p></div>";
		$tags = array();
	}

	///////////////////////////////Список всех тегов
	$modelTAG = new TagModel();
	$alltags = $modelTAG->getAllTags();

	for ($i=0; $i < count($alltags); $i++) { 
		$aside .= "<li><a href='/tags/{$alltags[$i]->getUrl()}'>".$alltags[$i]->getName()."</a></li>";
	}

	///////////////////////////////Хедер со всеми категориями
	$categModel = new CategoryModel;
	$allCat = $categModel->getAllCategories();
	$header = "<li><a href='/'>Main</a></li>";

	for ($i=0; $i < count($allCat); $i++) { 
		$header .= "<li><a href='/categories/{$allCat[$i]->getUrl()}'>".$allCat[$i]->getTitle()."</a></li>";
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<ul class = 'header'>
			<?=$header ?>
		</ul>
	</header>
	<aside>
		<ul class="aside">
			<?=$aside ?>			
		</ul>
	</aside>
	<main>
		<?=$content ?>
	</main>
</body>
</html>