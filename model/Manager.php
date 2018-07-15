<?php
class Manager
{
	protected function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=blogp4;charset=UTF8', 'root', '');
		return $db;
	}
}