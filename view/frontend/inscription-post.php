<?php 			
session_start();				
		class FormValidator
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
			
			  public function loader()
			  {
				  $this->getData();
				  $this->databaseConnect();
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
			  public function databaseConnect ()
			  {
					// CONNECT DataBASE
					try
					{
						$this->_bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '');
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
					}
					catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}  
			  } 
			  public function checkPseudoSQL ()
			  {
					// CHECK PSEUDO in DBB
					$req = $this->_bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
					$req->execute(array($this->_pseudo));
					$data = $req->fetch(); 
					if ($data >= 1)
					{
						header('Location: inscription.php?check=pseudo');
						$this->_pseudoBoolean = FALSE; 
					}
					else if ($data == 0)
					{
						$this->_pseudoBoolean = TRUE; 
					}
					$req->closeCursor();												
			  }
			  public function checkPasswords ()
			  {
				  
					if("$this->_pass2" == "$this->_pass")
					{
						$this->_passBoolean = TRUE;
						//echo "valeur du booléen ---> ".$this->_passBoolean;								
					}
					else
					{
						$this->_passBoolean = FALSE;
						header('Location: inscription.php?check=pass');
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
						header('Location: inscription.php?check=passLenght');
					}
			  }
			   public function checkMailSQL ()
			  {
					// CHECK MAIL in DBB
					$req = $this->_bdd->prepare('SELECT * FROM membres WHERE email = ?');
					$req->execute(array($_POST['mail']));
					$data = $req->fetch(); 
					if ($data >= 1)
					{
						header('Location: inscription.php?check=email');
						$this->_mailDatabaseBoolean = FALSE; 
					}
					else if ($data == 0)
					{
						$this->_mailDatabaseBoolean = TRUE; 
					}
					
			  }  
			  public function checkMailREGEX ()
			  {
					// check mail with REGEX
					if (preg_match('#^.+@.+\..+#',$this->_mail))
					{					
						$this->_mailREGEXBoolean = TRUE; 
					}
					else
					{
						header('Location: inscription.php?check=regex');	
						$this->_mailREGEXBoolean = FALSE; 
					}	
			  }
			  public function insertDataSQL ()
			  {
					// PASSWORD HASH
					$grain = 'F89gK132b2'.$this->_pseudo;
					$sel = $this->_pass.'Zzi8kwW0c';
					$passHache = sha1($grain.$this->_pass.$sel);					
					
					 //PREPARE DataBASE 
					$req = $this->_bdd->prepare('INSERT INTO membres (pass, pseudo, email, date_inscription) VALUES(:pass, :pseudo, :email, CURDATE())');
					// ORDER DataBASE 
					$req->execute(array(
					'pass' => $passHache,
					'pseudo' => $this->_pseudo,
					'email' => $this->_mail));
			echo 'Bienvenue parmi nous ! ';	
			  }
			   public function nextPage()
			  {
				  if("$this->_passBoolean" == TRUE && "$this->_passLenghtBoolean" == TRUE && "$this->_pseudoBoolean" == TRUE && "$this->_mailDatabaseBoolean" == TRUE && "$this->_mailREGEXBoolean" == TRUE)
					{
			echo "<br>next Page !";
						$this->insertDataSQL();
						//redirection en fonction de la page de provenance
						$_SESSION['pseudo'] = $this->_pseudo;						
						if (isset($_SESSION['redirectionPage']))
						{
							$link = $_SESSION['redirectionPage']; 
							header('Location: '.$link);
						}
						else
						{
					     	header('Location: ../../index.php');
						}
					}
					else
					{
						echo "<br>PAS next Page !";
					}
			  }
		}
		$formValidator1 = new FormValidator();
		$formValidator1->loader();