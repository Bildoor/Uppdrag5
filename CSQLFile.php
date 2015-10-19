<?php

class CSQLFile
{
	private $filename;
	private $description;
	private $sql;
	private $result;
	private $lineStart;
	private $lineEnd;

	public function __construct($filename)
	{
		$this->filename=$filename;
	}

	public function readFileParts()
	{
		$file=file('sql/' . $_GET['p'] . '.txt', FILE_IGNORE_NEW_LINES);
		$this->lineStart=0;
		foreach ($file as $index=> $row)
		{
			if ($row == '--******--') 
			{
				$this->lineEnd = $index-0;
				$this->description = array_slice($file, $this->lineStart, $this->lineEnd);
			}
			else if ($row == '--??????--') 
			{
				$this->lineStart = $this->lineEnd + 1;
				$this->lineEnd = $index-3;
				$this->sql = array_slice($file, $this->lineStart, $this->lineEnd);

				
			}
			else if(end($file) == $row) 
			{
				$this -> lineStart = $this -> lineEnd + 4;
				$this -> lineEnd = $index - 3;
				$this -> result = array_slice($file, $this -> lineStart, $this -> lineEnd);
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