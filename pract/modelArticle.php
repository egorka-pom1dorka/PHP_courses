<?php 
	require_once("category.php");
	require_once("article.php");
	require_once("tag.php");
	class ArticleModel
	{
		public function getArticle($url)
		{
			$link = mysqli_connect("localhost","host1316886_u1","g62YH9nn","host1316886_db1");
			$data = mysqli_query($link, "SELECT * FROM articles WHERE url=\"$url\"");
			while ($temp = mysqli_fetch_assoc($data)) {
				$results[] = new article\Article($temp['id'], $temp['categories_id'], $temp['content'], $temp['date'], $temp['views'], $temp['img'], $temp['url'], $temp['name']);
			}
			$results = $results[0];
			return $results;
		}

		public function getTags($art)
		{
			$link = mysqli_connect("localhost","host1316886_u1","g62YH9nn","host1316886_db1");
			$a = $art->getId();
			$tags_id = array();
			$results = array();
			$data = mysqli_query($link, "SELECT tags_id FROM articles_has_tags WHERE articles_id=$a");
			while ($temp = mysqli_fetch_assoc($data)) {
				$tags_id[] =  $temp['tags_id'];
			}
			foreach ($tags_id as $key => $value) {
				$data = mysqli_query($link, "SELECT name FROM tags WHERE id=$value");
				while ($temp = mysqli_fetch_assoc($data)) {
					$results[] =  $temp['name'];
				}
			}
			return $results;
		}

		public function getSortArticles()
		{
			$link = mysqli_connect("localhost","host1316886_u1","g62YH9nn","host1316886_db1");
			$data = mysqli_query($link, "SELECT * FROM articles ORDER BY views DESC");
			while ($temp = mysqli_fetch_assoc($data)) {
				$results[] = new article\Article($temp['id'], $temp['categories_id'], $temp['content'], $temp['date'], $temp['views'], $temp['img'], $temp['url'], $temp['name']);
			}
			return $results;
		}

		public function addView($art)
		{
			$link = mysqli_connect("localhost","host1316886_u1","g62YH9nn","host1316886_db1");
			$id = $art->getId();
			$data = mysqli_query($link, "UPDATE articles SET views=views+1 WHERE id=$id");
		}

		public function getCat($art)
		{
			$link = mysqli_connect("localhost","host1316886_u1","g62YH9nn","host1316886_db1");
			$id = $art->getCategories_id();
			$data = mysqli_query($link, "SELECT title FROM categories WHERE id=$id");
			$temp = mysqli_fetch_assoc($data);
			$results = $temp['title'];
			
			return $results;
		}
	}
?>