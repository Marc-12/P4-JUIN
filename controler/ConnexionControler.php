<?php
require_once('model/ConnexionManager.php');

class ConnexionControler 
{
	public function deconnectPage ()
	{
		session_destroy ();
		if (isset($_SESSION['redirectionPage']))
		{
			$link = $_SESSION['redirectionPage']; 
			header('Location: '.$link);
		}
		else
		{
			header('Location: index.php');
		}
	}
	public function connectPage ()
	{
		header('Location: view/frontend/connexion.php');
	}
	public function connexionPage ()
	{
		$connexionManager = new ConnexionManager();
		$connexionManager->connect();
	}
}