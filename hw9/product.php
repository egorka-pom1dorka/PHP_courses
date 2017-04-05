<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	class Product{
		private $name, $img, $price, $description;
		function __construct($name, $img, $price, $description)
		{
			$this->name=$name;
			$this->img=$img;
			$this->price=$price;
			$this->description=$description;
		}
		public function getImg(){
			return $this->img;
		}
		public function getName(){
			return $this->name;
		}
		public function getPrice()
		{
			return $this->price;
		}
		public function getDescription()
		{
			return $this->description;
		}
	}
?>