<?php namespace category;
	class Category{
		private $id, $title, $url;
		function __construct($id, $title, $url)
		{
			$this->id=$id;
			$this->title=$title;
			$this->url=$url;
		}
		public function getId(){
			return $this->id;
		}
		public function getTitle(){
			return $this->title;
		}
		public function getURL()
		{
			return $this->url;
		}
	}
?>