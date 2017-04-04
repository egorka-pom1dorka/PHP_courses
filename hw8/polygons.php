<?php header("Content-Type: image/jpeg; charset=UTF-8") ?>
<?php 
	class Polygon{
		var $_points = array();
		var $color;
		var $width;
		public function addPoint($x, $y)
		{
			array_push($this->_points, $x);
			array_push($this->_points, $y);
		}
		public function clear()
		{
			$_points = array();
		}
		public function setColor($color)
		{
			$this->color=$color;
		}
		public function setWidth($width)
		{
			$this->width=$width;
		}
		public function draw($img)
		{
			imagesetthickness($img, $this->width);
			imagepolygon($img, $this->_points, count($this->_points)/2, $this->color);
			imagejpeg($img);
		}
	}
?>