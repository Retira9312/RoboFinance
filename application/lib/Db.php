<?php

namespace application\lib;

use PDO;

class DB
{

	protected $db;

	public function __construct()
	{
		$config = require 'application/config/db.php';
		$this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . '', $config['user'], $config['password']);
	}

	public function query($sql)
	{
		$query = $this->db->query($sql);
		return $query;
	}

	public function probation($sql)
	{
		$result = $this->query($sql);
		return $result->fetchALL();
	}


	public function dismissed()
	{
		$result = $this->query($sql);
		return $result->fetchALL();
	}


	public function lastHire()
	{
		$result = $this->query($sql);
		return $result->fetchALL();
	}
}