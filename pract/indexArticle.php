<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	require_once("modelArticle.php");
	require_once("modelCategory.php");
	require_once 'modelTag.php';
	$artModel = new ArticleModel();
	$modelTAG = new TagModel();
	$categModel = new CategoryModel();
	$url = $_GET['url'];
	$article = $artModel->getArticle($url);
	$tags = array();

	//////////////////////////////////Добавить просмотр
	$artModel->addView($article);

	////////////////////////////////////Список тегов по статье
	foreach ($artModel->getTags($article) as $key => $value) {
		$tags[] = "<a href='/tags/{$value}'>".$value."</a>";
		$t = implode("; ", $tags);
	}

	///////////////////////////////////Список категорий по статье
	$c = $artModel->getCat($article);

	//////////////////////////////////Контент страникцы
	$content = "<div class='article'><img src='/{$article->getimg()}'><h1>".$article->getName()."</h1><p class='content'>".$article->getContent()."</p><p class='path'>Path: Main - ".$c." - ".$url."</p><p>Category: <b><a href='/categories/{$c}'>".$c."</a></b></p><p>Tags: <i>".$t."</i></p><p>Views: ".$article->getViews()."</p><p>Date: ".$article->getDAte()."</p></div>";
		
	//////////////////////////////////Боковой список со всеми тегами
	$alltags = $modelTAG->getAllTags();
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