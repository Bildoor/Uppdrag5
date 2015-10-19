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
				$this->lineEnd = $index-1;
				$this->description = array_slice($file, $this->lineStart, $this->lineEnd);
			}
			else if ($row == '--??????--') 
			{
				$this->lineStart = $this->lineEnd;
				$this->lineEnd = $index-1;
				$this->sql = array_slice($file, $this->lineStart, $this->lineEnd);

				return array($this->sql, $this->description, $this->result);
			}
			else if (false) 
			{
				
			}
		}
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