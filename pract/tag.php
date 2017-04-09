<?php namespace tag;
	class Tag{
		private $id, $name, $url;
		function __construct($id, $name, $url)
		{
			$this->id=$id;
			$this->url=$url;
			$this->name=$name;
		}
		public function getURL(){
			return $this->url;
		}
		public function getName(){
			return $this->name;
		}
		public function getId()
		{
			return $this->id;
		}
	}
?>