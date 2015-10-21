<?php

class CSQLFile
{
	private $filename;
	private $description;
	private $sql;
	private $result;
	private $lineStart;
	private $lineEnd;
	private $sqlResult;

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

	public function executeStatements()
	{
		$CDatabase = new CDatabase();
		$execSql = $CDatabase->prepare(implode($this->sql));
		$execSql -> execute();

		$stmt = $CDatabase -> prepare(implode($this->result));
		$stmt -> execute();
		$res = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		var_dump($res);
		
		//return $this -> generateHTMLTableResult($res);
	}

	private function generateHTMLTableResult($stmObj)
	{
		$html = "<br><br><table>";

		foreach ($stmObj as $value)
		{
			var_dump($value);
			echo "<br>habbo";
			//$html .= "<tr><td>$value[]</td></tr>";
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