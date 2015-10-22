<?php

class CSQLFileMenu{
	//get CWD (För att få tag i mappen man hålll hus i)
	public $sql;  

	public function __construct()
	{
		return $this -> getMainMenu();
	}

	public function getContent()
	{
		
	}

	public function getNavigation()
	{
		
	}

	public function getMainMenu($path = "")
	{
		$files = scandir("sql/$path");

		foreach ($files as $index => $file) 
		{
			if($file != "." && $file != "..")
				if(isset($_POST['sqlfile']) && $_POST['sqlfile'] == $file)
				{
					$sql = new CSQLFile($file);
					return $sql->readFileParts();
				}
		}		
	}

	private function getSubMenu($path)
	{
		$this -> getMainMenu($path);
	}
}