<?php
class Autoloader
{
	public static function loader($class)
	{
		$filename= strtolower($class) . '.php';
		$file= 'IS218project/is218/' . $filename;
		if (!file_exists($file))
		{
			return false;
		}
		include $file;
	}
}
?>
