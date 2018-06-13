<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

						include_once ('/../AutoLoader.php');
						include_once ('/../Router.php');
											
class PostControler 
{
			public function listPosts()
			{			
						$route  =  __FUNCTION__ ;
						$router = initRouteur();
						$myClass = ($router["".$route.""]["model"]);
						Autoloader::register();	
						$postManager = new $myClass(); 									
				//				
				//$postManager = new PostManager(); 
				$posts = $postManager->getPosts(); 	
				require('view/frontend/listPostsView.php');								
				//
			}
			public function post($arrayParameters)
			{
				$postManager = new PostManager();
				$commentManager = new CommentManager();
				$post = $postManager->getPost($arrayParameters['id']);				
				$comments = $commentManager->getComments($arrayParameters['id']);
				require('view/frontend/postView.php');	
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
				$link = $_SESSION['redirectionPage']; 
				header('Location: '.$link);	
			}
}