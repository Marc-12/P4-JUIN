<?php
									
class PostControler 
{
		public function listPosts()
		{							
			$postManager = new PostManager(); 
			$posts = $postManager->getPosts(); 	
			require('/view/frontend/listPostsView.php');								
		}
		public function post($arrayParameters)
		{
			$postManager = new PostManager();
			$commentManager = new CommentManager();
			$post = $postManager->getPost($arrayParameters['id']);				
			$comments = $commentManager->getComments($arrayParameters['id']);
			require('/view/frontend/postView.php');	
		}
		public function commentOpinion($arrayParameters)
		{
			$commentManager = new CommentManager();
			if($_GET['opinion'] == "like")	
			{
				$commentManager->opinionCommentLike($arrayParameters['id']);	
			}
			elseif($_GET['opinion'] == "dislike")	
			{
				$commentManager->opinionCommentDislike($arrayParameters['id']);	
			}	
			elseif($_GET['opinion'] == "redFlag")	
			{
				$commentManager->opinionredFlag($arrayParameters['id']);	
			}
			if (isset($_SESSION['redirectionPage']))
			{
				$link = $_SESSION['redirectionPage']; 
				header('Location: '.$link);
			}
			else
			{
				header('Location: /index.php');
			}
		}
		
}