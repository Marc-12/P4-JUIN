<?php
require_once('ConnectDbase.php');

class InscriptionManager extends ConnectDbase
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
			$connect = $db->prepare('SELECT * FROM membres WHERE pseudo = ?');
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
			$connect = $db->prepare('SELECT * FROM membres WHERE email = ?');
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
			$connect = $db->prepare('SELECT * FROM membres WHERE pseudo = ?');
			$connect->execute(array($this->_pseudo));
			$data = $connect->fetch(); 
			$connect->closeCursor();	
			if ($data >= 1)
			{
				header('Location: view/frontend/inscription.php?check=pseudo');
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
				header('Location: view/frontend/inscription.php?check=pass');
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
				header('Location: view/frontend/inscription.php?check=passLenght');
			}
	  }
	   public function checkMailSQL ()
	  {
			$db = $this->dbConnect();
			$connect = $db->prepare('SELECT * FROM membres WHERE email = ?');
			$connect->execute(array($_POST['mail']));
			$data = $connect->fetch(); 
			$connect->closeCursor();
			if ($data >= 1)
			{
				header('Location: view/frontend/inscription.php?check=email');
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
				header('Location: view/frontend/inscription.php?check=regex');	
				$this->_mailREGEXBoolean = FALSE; 
			}	
	  }
	  public function insertDataSQL ()
	  {
			$grain = 'F89gK132b2'.$this->_pseudo;
			$sel = $this->_pass.'Zzi8kwW0c';
			$passHache = sha1($grain.$this->_pass.$sel);	
			$db = $this->dbConnect();
			$connect = $db->prepare('INSERT INTO membres (pass, pseudo, email, date_inscription) VALUES(:pass, :pseudo, :email, CURDATE())');
			$connect->execute(array('pass' => $passHache,'pseudo' => $this->_pseudo,'email' => $this->_mail));
			$connect->closeCursor();
	  }
	   public function nextPage()
	  {
			if("$this->_passBoolean" == TRUE && "$this->_passLenghtBoolean" == TRUE && "$this->_pseudoBoolean" == TRUE && "$this->_mailDatabaseBoolean" == TRUE && "$this->_mailREGEXBoolean" == TRUE)
			{
				echo "<br>next Page !";
				$this->insertDataSQL();
				$_SESSION['pseudo'] = $this->_pseudo;						
				if (isset($_SESSION['redirectionPage']))
				{
					$link = $_SESSION['redirectionPage']; 
					header('Location: '.$link);
				}
				else
				{
					header('Location:/P4-VERSION5/index.php');
				}
			}
			else
			{
				echo "<br>PAS next Page !";
			}
	  }
}