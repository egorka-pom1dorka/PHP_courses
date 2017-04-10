<?php 
	require_once("category.php");
	require_once("article.php");
	class CategoryModel
	{
		public function getAllCategories()
		{
			$link = mysqli_connect("localhost","host1316886_u1","g62YH9nn","host1316886_db1");
			$data = mysqli_query($link, "SELECT * FROM categories");
			$results = array();
			while ($temp = mysqli_fetch_assoc($data)) {
				$results[] = new category\Category($temp['id'], $temp['title'], $temp['url']);
			}
			return $results;
		}

		public function getArticles($cat)
		{
			$link = mysqli_connect("localhost","host1316886_u1","g62YH9nn","host1316886_db1");
			$a = $cat->getId();
			$results = array();
			$data = mysqli_query($link, "SELECT * FROM articles WHERE categories_id=$a ORDER BY date");
			while ($temp = mysqli_fetch_assoc($data)) {
				$results[] = new article\Article($temp['id'], $temp['categories_id'], $temp['content'], $temp['date'], $temp['views'], $temp['img'], $temp['url'], $temp['name']);
			}
			return $results;
		}

		public function getCategory($url)
		{
			$link = mysqli_connect("localhost","host1316886_u1","g62YH9nn","host1316886_db1");
			$data = mysqli_query($link, "SELECT * FROM categories WHERE url=\"$url\"");
			$results = array();
			while ($temp = mysqli_fetch_assoc($data)) {
				$results[] = new category\Category($temp['id'], $temp['title'], $temp['url']);
			}
			return $results[0];
		}
	}
?>