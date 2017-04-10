<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	require_once("modelArticle.php");
	require_once("modelTag.php");
	require_once 'modelCategory.php';

	$tagModel = new TagModel();
	$artModel = new ArticleModel();
	$categModel = new CategoryModel();
	$content="";
	$url = $_GET['url'];

	////////////////////////////////////Новости по данному тегу
	$tag = $tagModel->getTag($url);
	$articles = $tagModel->getArticleForTag($tag);

	for ($i=0; $i < count($articles); $i++) { 
		$c = $artModel->getCat($articles[$i]);
		$content .= "<div><img src='/{$articles[$i]->getimg()}'><h2><a href='/articles/{$articles[$i]->getUrl()}'>".$articles[$i]->getName()."</a></h2><p>Category: <b><a href='/categories/{$c}''>".$c."</a></b></p><p>Views: ".$articles[$i]->getViews()."</p><p>Date: ".$articles[$i]->getDate()."</p></div>";
	}

	//////////////////////////////////Боковой список со всеми тегами
	$alltags = $tagModel->getAllTags();
	$aside = "";

	for ($i=0; $i < count($alltags); $i++) { 
		$aside .= "<li><a href='/tags/{$alltags[$i]->getUrl()}'>".$alltags[$i]->getName()."</a></li>";
	}

	/////////////////////////////////Хедер со всеми категориями
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
	<link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body>
	<header>
		<ul class="header">
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