<?php
				
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', ''); 
					array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
						
				$data = $bdd->prepare('SELECT category_name FROM category');
				$data->execute(array());

				//$req->closeCursor();
				return $data;
				
				echo 'dfdfdfdf'; 				
				echo $data;
	
	
	
	
		$req = $db->prepare('SELECT id, admin_comment, pseudo_id, redFlag, likes, dislike, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$req->execute(array($postId));
		$comments = $req->fetchAll();
		$req->closeCursor();
		return $comments;