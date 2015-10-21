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
	private $sqlResult;

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

	public function executeStatements()
	{
		$CDatabase = new CDatabase();
		$execSql = $CDatabase->prepare(implode($this->sql));
		var_dump($execSql);
		echo "<br><hr>";
		//$works = $execSql->execute();


		$stmt = $CDatabase -> prepare(implode($this->result));
		//$stmt -> execute();
		//$res = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		
		//return $this -> generateHTMLTableResult($res);
	}

	private function generateHTMLTableResult($stmObj)
	{
		$html = "<br><br><table>";

		foreach ($stmObj as $value)
		{
			$html .= "<tr><td>$value</td></tr>";
		}

			$html .= "</table>";

			return $html;
	}

	public function getDescription()
	{
		return $this->description;
	} 

	public function getSQL()
	{
		return $this->sql;
	}

	public function getResult()
	{
		return $this->result;
	}
}