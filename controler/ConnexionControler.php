<?php
// require_once('model/ConnexionManager.php');

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
		require('view/frontend/connexion.php');
	}
	public function connexionPage ($arrayParameters)
	{
		$connexionManager = new ConnexionManager();
		$connexionManager->connect($arrayParameters);
	}
}