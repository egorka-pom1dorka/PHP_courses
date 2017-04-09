<?php namespace article;
	class Article{
		private $id, $categories_id, $content, $date, $views, $img, $url, $name;
		function __construct($id, $categories_id, $content, $date, $views, $img, $url, $name)
		{
			$this->id=$id;
			$this->categories_id=$categories_id;
			$this->content=$content;
			$this->date=$date;
			$this->views=$views;
			$this->img=$img;
			$this->url=$url;
			$this->name=$name;
		}
		public function getId(){
			return $this->id;
		}
		public function getName(){
			return $this->name;
		}
		public function getCategories_id()
		{
			return $this->categories_id;
		}
		public function getContent()
		{
			return $this->content;
		}
		public function getDate()
		{
			return $this->date;
		}
		public function getViews()
		{
			return $this->views;
		}
		public function getImg()
		{
			return $this->img;
		}
		public function getURL()
		{
			return $this->url;
		}
	}
?>