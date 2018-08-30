<?php

class ConnexionManager extends Manager
{	
	public function connect($arrayParameters)
	{
		 $pass = $_POST['pass']; 
		 $pseudo = $_POST['pseudo'];

		 $db = $this->dbConnect();
		 $connect = $db->prepare('SELECT id, admin, pseudo, pass FROM users WHERE pseudo = :pseudo');
		 $connect->execute(array('pseudo' => $pseudo));
		 $resultat = $connect->fetch(); 
		
		 // print_r ($data);
		 // print_r ($data['pass']);
		 $pass_hache = password_verify($pass, $resultat['pass']);
 
		 
		 if ($pass_hache == true && $pseudo == $resultat['pseudo'])
		 {
			$_SESSION['id'] = $resultat['id'];
			$_SESSION['pseudo'] = $pseudo;	
			if ($resultat['admin'] == "admin")
			{
				$_SESSION['user'] = "admin";							
			}				
			header('Location: index.php');
		 }
		 else
		 {	
			require('view/frontend/connexion.php');
		 }
	}
}