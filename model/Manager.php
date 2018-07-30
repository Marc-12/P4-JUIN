<?php
class Manager
{
	protected function dbConnect()
	{
		// $db = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', '');
		$db = new PDO('mysql:host=thefotottf122.mysql.db;dbname=thefotottf122;charset=utf8', 'thefotottf122', 'WPsqlvar17');
		return $db;
	}
}