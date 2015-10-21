<?php

class CSQLFile
{
	private $filename;
	private $description;
	private $sql;
	private $result;
	private $lineStart;
	private $lineEnd;
	private $lineTot;

	public function __construct($filename)
	{
		$this->filename=$filename;
	}

	public function readFileParts()
	{
		$file=file('sql/' . $_GET['p'] . '.txt', FILE_IGNORE_NEW_LINES);
		$this->lineStart=0;
		foreach ($file as $index => $row)
		{
			if ($row == '--******--') 
			{
				$this->lineEnd = $index;
				$tot = $this->lineEnd;
				$this->description = array_slice($file, $this->lineStart, $this->lineEnd);
			}
			else if ($row == '--??????--') 
			{
				$this->lineStart = $this->lineEnd + 1;
				$this->lineEnd = $index - $this->lineStart;
				$this->sql = array_slice($file, $this->lineStart, $this->lineEnd);
			}
			else if(end($file) == $row) 
			{
				$this -> lineStart = $this -> lineStart + $this -> lineEnd + 1;
				echo $this -> lineStart ;
				$this -> lineEnd = $index - $this -> lineStart;
				$this -> result = array_slice($file, $this -> lineStart, $this -> lineEnd + 1);
			}
		}
		return array($this->description, $this->sql, $this->result);
	}

	private function executeStatements()
	{

	}

	private function generateHTMLTableResult()
	{

	}

	public function getDescription()
	{

	} 

	public function getSQL()
	{

	}

	public function getResult()
	{

	}
}