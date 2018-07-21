<?php
// require_once('model/CommentManager.php');

class UserControler 
{		public function __construct ()
		{
			if(!isset($_SESSION['id']))	
			{
				throw new Exception ('accès interdit');
			}
		}
		public function addComment($arrayParameters)
		{	
			// var_dump ($arrayParameters);
			$pseudoId = $_SESSION['id'];
			$commentManager = new CommentManager();
			$affectedLines = $commentManager->postComment($pseudoId, $arrayParameters['id'], $arrayParameters['author'], $arrayParameters['comment']);
			if ($affectedLines === false) 
			{
				throw new Exception('Impossible d\'ajouter le commentaire !');
			}
			else 
			{
				header('Location: index.php?action=post&id=' . $arrayParameters['id']);
			}
		}
		public function eraseComment($arrayParameters)
		{
			$id = $_GET['id'];
			$commentManager = new CommentManager();
			$commentManager->eraseComment($arrayParameters['id']);	
			$link = $_SESSION['redirectionPage']; 
			header('Location: '.$link);	
		}
		public function updateCommentPage($arrayParameters)
		{
			require('view/frontend/updatecommentView.php');
		}
		public function getCommentToModify($arrayParameters)
		{
			$commentManager = new CommentManager();
			$commentManager->getComments2($arrayParameters['id']);
		}
		public function updateCommentContent($arrayParameters)
		{
			$commentManager = new CommentManager();
			$updateComment = $commentManager->postUpdateComment($arrayParameters['id'], $arrayParameters['author'], $arrayParameters['comment']);	
			$link = $_SESSION['redirectionPage']; 
			header('Location: '.$link);	
		}
}