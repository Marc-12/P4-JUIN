<?php

class ConnexionManager extends Manager
{	
	public function connect($arrayParameters)
	{
		 $pass = $_POST['pass']; 
		 $pseudo = $_POST['pseudo']; 
		 $grain = 'F89gK132b2'.$pseudo;
		 $sel = $pass.'Zzi8kwW0c';
		 $pass_hache = sha1($grain.$pass.$sel);
		 $db = $this->dbConnect();
		 $connect = $db->prepare('SELECT id, admin FROM users WHERE pseudo = :pseudo AND pass = :pass');
		 $connect->execute(array('pseudo' => $pseudo,'pass' => $pass_hache));
		 $resultat = $connect->fetch(); 
		 if (!$resultat)
		 {
				require('/view/frontend/connexion.php');
		 }
		 else
		 {	
			$_SESSION['id'] = $resultat['id'];
			$_SESSION['pseudo'] = $pseudo;	
			if ($resultat['admin'] == "admin")
			{
				$_SESSION['user'] = "admin";							
			}				
			header('Location: /index.php');
		 }
	}
}