<?php

class CDatabase
{
	private $dsn;
	private $username;
	private $password;
	private $options;
	private $PDO;

	public function __construct($dbname='test', $options='file', $user='root', $pass='')
	{
		$this->username = $user;
		$this->password = $pass;
		$this->options = $options;

		if(count($dbname))
			$this->dsn .= $dbname;
		if($this->options == 'database')
			$this->PDO = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $this->username, $this->password);
		else if($this->options == 'file')
			$this->PDO = new PDO("sqlite:$this->dsn");
		else
			die('felaktigt värde på options (rad 20)');

		return $this->PDO;
	}

	public function prepare($sql)
	{
		return $this->PDO->prepare($sql);
	}
}