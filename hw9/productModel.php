<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php 
	require_once("product.php");
	class productModel
	{
		public function getProducts($query="")
		{
			$link = mysqli_connect("localhost","user","hedogo51","databuse");
			$data = mysqli_query($link, "SELECT * FROM products WHERE 1=1 $query");
			while ($temp = mysqli_fetch_assoc($data)) {
				$results[] = new Product($temp['name'], $temp['image'], $temp['price'], $temp['description']);
			}
			return $results;
		}

		public function putProduct($a){
			$link = mysqli_connect("localhost","user","hedogo51","databuse");
			$query = "INSERT INTO products VALUES(default, ".$a->getName().", ".$a->getImg().", ".$a->getPrice().", ".$a->getDescription().")";
			mysqli_query($link, $query);
		}
	}
?>