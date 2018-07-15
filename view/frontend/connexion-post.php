<?php 	
					session_start();
					// CONNECT DataBASE
						try
						{
							$bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '');
							array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
						}
						catch(Exception $e)
						{
							die('Erreur : '.$e->getMessage());
						}

					// getting DATA from the FORM	
					$pass = $_POST['pass']; 
					$pseudo = $_POST['pseudo']; 

					// PASSWORD HASH
					$grain = 'F89gK132b2'.$pseudo;
					$sel = $pass.'Zzi8kwW0c';
					$pass_hache = sha1($grain.$pass.$sel);
										
					 //PREPARE DataBASE and check data
					$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');
					$req->execute(array(
						'pseudo' => $pseudo,
						'pass' => $pass_hache));
					$resultat = $req->fetch();

					// CONDITION to LOGIN:
					if (!$resultat)
					{
						header('Location: connexion.php');
					}
					else
					{	
						$_SESSION['id'] = $resultat['id'];
						$_SESSION['pseudo'] = $pseudo;	
						if ($_SESSION['id'] == 54)
						{
							$_SESSION['user'] = "admin";							
						}
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