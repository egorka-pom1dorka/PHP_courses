<?php header("Content-Type: text/html; charset=UTF-8") ?>
<?php 
	class File{
		var $path;
		function __construct($path)
		{
			$this->path=$path;
		}
		public function getSize()
		{
			return filesize($this->path);
		}
		public function getExtension()
		{
			return pathinfo($this->path, PATHINFO_EXTENSION);	 
		}
		public function lastModified()
		{
			return date("F d Y H:i:s", filemtime($this->path));
		}
		public function getPath()
		{
			return $this->path;
		}
		public function getContent()
		{
			return "<pre>".file_get_contents($this->path)."</pre>";
		}
		public function putContent($data)
		{
			file_put_contents($this->path, $data);
		}
		public function move($newPath)
		{
			rename($this->path, $newPath."/".$this->path);
			$this->path=$newPath."/".$this->path;
		}
		public function Copy($newPath)
		{
			copy($this->path, $newPath."/".$this->path);
		}
		public function remove()
		{
			unlink($this->path);
			unset($this);
		}
	}
?>