<?php

class InscriptionManager extends Manager
{	
	 public $_bdd =  "";					
	 public $_pseudo =  "";					
	 public $_mail =  "";					
	 public $_pass =  "";					
	 public $_pass2 =  "";					
	 public $_pseudoBoolean = FALSE;					
	 public $_passBoolean = FALSE;					
	 public $_passLenghtBoolean = FALSE;					
	 public $_mailDatabaseBoolean = FALSE;					
	 public $_mailREGEXBoolean = FALSE;	
		
	  public function checkPseudo ()
	  {
			$db = $this->dbConnect();
			$connect = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
			$connect->execute(array($_POST['user']));
			$data = $connect->fetch(); 
			if ($data >= 1)
			{
				echo "1";
			}
			else if ($data == 0)
			{
				echo "0";
			}
			$connect->closeCursor();	
	  } 
	  public function checkMail ()
	  {		
			$db = $this->dbConnect();
			$connect = $db->prepare('SELECT * FROM users WHERE email = ?');
			$connect->execute(array($_POST['mail']));
			$data = $connect->fetch(); 				
			if ($data >= 1)
			{
				echo "1";
			}
			$connect->closeCursor();	
	  } 
	  public function member ()
	  {
		  $this->getData();
		  $this->checkPseudoSQL();
		  $this->checkPasswords();
		  $this->checkPassWordLenght();
		  $this->checkMailSQL();
		  $this->checkMailREGEX();
		  $this->nextPage();
	  }
	  public function getData ()
	  {
		$this->_pseudo = $_POST['pseudo'];
		$this->_pass = $_POST['pass'];
		$this->_pass2 = $_POST['pass2'];
		$this->_mail = $_POST['mail'];
	  }   
	  public function checkPseudoSQL ()
	  {
		  		$db = $this->dbConnect();

			$db = $this->dbConnect();
			$connect = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
			$connect->execute(array($this->_pseudo));
			$data = $connect->fetch(); 
			$connect->closeCursor();	
			if ($data >= 1)
			{
				header('Location: index.php?action=memberPage&check=pseudo');	
				$this->_pseudoBoolean = FALSE; 
			}
			else if ($data == 0)
			{
				$this->_pseudoBoolean = TRUE; 
			}
	  }
	  public function checkPasswords ()
	  {
			if("$this->_pass2" == "$this->_pass")
			{
				$this->_passBoolean = TRUE;
			}
			else
			{
				$this->_passBoolean = FALSE;
				header('Location: index.php?action=memberPage&check=pass');	
			}										
	  }
	  public function checkPassWordLenght ()
	  {
			$passLenght = strlen($this->_pass); 
			if ($passLenght > 4)
			{
				$this->_passLenghtBoolean = TRUE; 
			}
			else
			{
				$this->_passLenghtBoolean = FALSE; 
				header('Location: index.php?action=memberPage&check=passLenght');	
			}
	  }
	   public function checkMailSQL ()
	  {
			$db = $this->dbConnect();
			$connect = $db->prepare('SELECT * FROM users WHERE email = ?');
			$connect->execute(array($_POST['mail']));
			$data = $connect->fetch(); 
			$connect->closeCursor();
			if ($data >= 1)
			{
				header('Location: index.php?action=memberPage&check=email');	
				$this->_mailDatabaseBoolean = FALSE; 
			}
			else if ($data == 0)
			{
				$this->_mailDatabaseBoolean = TRUE; 
			}
	  }  
	  public function checkMailREGEX ()
	  {
			if (preg_match('#^.+@.+\..+#',$this->_mail))
			{					
				$this->_mailREGEXBoolean = TRUE; 
			}
			else
			{
				header('Location: index.php?action=memberPage&check=regex');	
				$this->_mailREGEXBoolean = FALSE; 
			}	
	  }
	  public function insertDataSQL ()
	  {

			$passHache = password_hash($this->_pass, PASSWORD_DEFAULT);	
			
			$db = $this->dbConnect();
			$req = $db->prepare('INSERT INTO users(email, pass, pseudo, admin, date_inscription) VALUES(?, ?, ?, ?, NOW())');
			$req->execute(array($this->_mail, $passHache, $this->_pseudo, ''));
			$post = $req->fetch();
			$req->closeCursor();
			return $post;
	  }
	   public function nextPage()
	  {
			if("$this->_passBoolean" == TRUE && "$this->_passLenghtBoolean" == TRUE && "$this->_pseudoBoolean" == TRUE && "$this->_mailDatabaseBoolean" == TRUE && "$this->_mailREGEXBoolean" == TRUE)
			{
				$this->insertDataSQL();
				$_SESSION['pseudo'] = $this->_pseudo;						
				header('Location: index.php');
		    }
			else
			{
				echo "<br>Désolé erreur, veuillez contacter l'administrateur du site Web en question.";
			}
	 }
}