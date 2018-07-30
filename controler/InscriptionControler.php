<?php
// require_once('model/InscriptionManager.php');

class InscriptionControler 
{
	public function memberPage ()
	{
		// header('Location: view/frontend/inscription.php');
		require('view/frontend/inscription.php');

	}
	public function inscriptionPage ()
	{
		$inscriptionManager = new InscriptionManager();
		$inscriptionManager->member ();
	}
	public function checkPseudo ()
	{
		$inscriptionManager = new InscriptionManager();
		$inscriptionManager->checkPseudo ();
	}
	public function checkMail ()
	{
		$inscriptionManager = new InscriptionManager();
		$inscriptionManager->checkMail ();
	}
}		