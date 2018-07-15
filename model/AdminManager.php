<?php

class AdminManager extends Manager
{		
	public function addCategory($categoryName)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO category(categoryName) VALUES(?)');
		$req->execute(array($categoryName));
		$req->closeCursor();	
	}
	public function readCategory()
	{	
		$db = $this->dbConnect();
		$allCategory = $db->prepare('SELECT categoryName FROM category');
		$allCategory->execute(array());				
		foreach ($allCategory as $data)
		{
			echo '<option value="'.$data['categoryName'].'">'.$data['categoryName'].'</option>';
		}
	}
	public function deleteCategory($categoryName)
	{	
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM category WHERE categoryName = ?');
		$deleteCategory = $req->execute(array($categoryName));
	}
}