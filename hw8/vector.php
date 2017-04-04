<?php header("Content-Type: text/html; charset=UTF-8") ?>
<?php 
	class Vector2D{
		var $x;
		var $y;
		public function __construct($x, $y){
			$this->y=$y;
			$this->x=$x;
		}
		public function length(){
			$ans = sqrt(pow($this->x, 2)+pow($this->y, 2));
			return $ans;
		}
		public function getNorm(){
			return new Vector2D($this->y, $this->x*(-1));
		}
		public function angle(){
			$ans = acos($this->x/$this->length());
			return $ans." рад";
		}
		public function turn($degree){
			$angle = deg2rad($degree);
			$rotX = $this->x*cos($angle) - $this->y*sin($angle);
			$rotY = $this->x*sin($angle) + $this->y*cos($angle);
			$this->x=$rotX;
			$this->y=$rotY;
		}
	}
?>