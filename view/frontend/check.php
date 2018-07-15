<?php
					// CONNECT DataBASE
						try
						{
							$bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '', 
							array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
						}
						catch(Exception $e)
						{
							die('Erreur : '.$e->getMessage());
						}
				if( isset($_POST['user']))
				{	
					
					$req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
					$req->execute(array($_POST['user']));
					$data = $req->fetch(); 
					if ($data >= 1)
					{
						echo "1";
					}
					else if ($data == 0)
					{
						echo "0";
					}
					$req->closeCursor();
				}
				if( isset($_POST['mail']))
				{						
					$req = $bdd->prepare('SELECT * FROM membres WHERE email = ?');
					$req->execute(array($_POST['mail']));
					$data = $req->fetch(); 
					
					if ($data >= 1)
					{
						echo "1";
					}
					$req->closeCursor();
				}
?>				





