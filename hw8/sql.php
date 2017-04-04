<?php header("Content-Type: text/html; charset=UTF-8") ?>
<?php 
	class SQLConnection
	{
		var $host;
		var $user;
		var $password;
		var $databuse;
		public static $q;
		public static $error;
		function __construct()
		{
			if($link===null){
				$this->host="localhost";
				$this->user="user";
				$this->password="hedogo51";
				$this->databuse="databuse")
			}
			else{
				$this->host=func_get_arg(0);
				$this->user=func_get_arg(1);
				$this->password=func_get_arg(2);
				$this->databuse=func_get_arg(3);
			}
		}
		public function execSQL($query)
		{
			self::$q = $query;
			$link = mysqli_connect($this->host, $this->user, $this->password, $this->databuse);
			mysqli_query($link, $query);
			self::$error = mysqli_error($link);
		}
		public function getArray($query)
		{
			self::$q = $query;
			$temp = array();
			$link = mysqli_connect($this->host, $this->user, $this->password, $this->databuse);
			$data = mysqli_query($link, $query);
			self::$error = mysqli_error($link);
			if(!(self::$error)){
				while($d = mysqli_fetch_assoc($data)){
				$temp[] = $d;
				}
			}
			return $temp;
		}
		public function getLastQuery()
		{
			return self::$q;
		}
		public function getLastError()
		{
			return self::$error;
		}
	}
?>