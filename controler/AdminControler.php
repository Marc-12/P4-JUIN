<?php
// require_once('model/PostManager.php');
// require_once('model/CommentManager.php');
// require_once('model/AdminManager.php');

class AdminControler 
{
	
	private $_urlImage =  "";					

	public function __construct ()
	{
		if(!isset($_SESSION['user']) == "admin")	
		{
			// header('Location: index.php');	
			throw new Exception ('accès interdit');
		}
	}
	public function admin ()
	{
		$postManager = new PostManager(); 
		$commentManager = new CommentManager();
		$posts = $postManager->getPosts(); 
		$allComments = $commentManager->getAllComments();
		require('view/frontend/admin.php');
	}
	public function adminDeletePost ($arrayParameters)
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();
		$postManager->deletePost($arrayParameters['id']); 
		$commentManager->erasePostComments($arrayParameters['id']); 						
		$this->admin();
	}	
	public function adminAcceptComment ($arrayParameters)
	{
		$commentManager = new CommentManager();
		$commentManager->acceptComment($arrayParameters['id']); 
		$this->admin();
	}
	public function adminRefuseComment ($arrayParameters)
	{
		$commentManager = new CommentManager();
		$commentManager->refuseComment($arrayParameters['id']); 
		$this->admin();
	}
	public function adminDeleteComment ($arrayParameters)
	{
		$commentManager = new CommentManager();
		$commentManager->eraseComment($arrayParameters['id']);						
		$this->admin();
	}
	private function photoSql ($chemin)
	{
		$imageExtension = str_replace('image/','.',$chemin); 
		$uniqId = md5(uniqid(rand(), true));
		$image_url = 'public/images/posts/'.$uniqId.$imageExtension;
		$this->_urlImage = $image_url;
		function uploadImage($image,$destination,$maxsize=FALSE,$extensions=FALSE,$image_url)
		{
			 if (!isset($_FILES['image']) OR $_FILES['image']['error'] > 0) return FALSE;
			 if ($maxsize !== FALSE AND $_FILES['image']['size'] > $maxsize) return FALSE;
			 $ext = substr(strrchr($_FILES['image']['name'],'.'),1);
			 if ($extensions !== FALSE AND !in_array($ext,array('png','gif','jpg','jpeg','JPG','JPEG'))) return FALSE;
			 return move_uploaded_file($_FILES['image']['tmp_name'],$image_url);
		}
		uploadImage('image','public/images/posts/',154857600, array('png','gif','jpg','jpeg','JPG','JPEG'),$image_url);
	}
	public function adminAddPost($arrayParameters)
	{
		if(!empty($_FILES['image']['type']))
		{
			$chemin = $_FILES['image']['type'];
			$this->photoSql ($chemin);
			$postManager = new PostManager();
			$posts = $postManager->addPost($this->_urlImage,$arrayParameters['title'],$arrayParameters['content'],$arrayParameters['categories']); 
			$this->admin();
		}
		else
		{					
			$image_url = ' ';
			$postManager = new PostManager();
			$posts = $postManager->addPost($image_url,$arrayParameters['title'],$arrayParameters['content'],$arrayParameters['categories']); 
			$this->admin();
		}
	}
	public function adminUpdatePost ($arrayParameters)
	{													
		if(!empty($_FILES['image']['type']))
		{
			$chemin = $_FILES['image']['type'];
			$this->photoSql ($chemin);			
			$postManager = new PostManager(); 
			$UpdatedPost = $postManager->updatePost($arrayParameters['title'], $arrayParameters['content'], $arrayParameters['categories'], $this->_urlImage, $arrayParameters['id']); 
			$this->admin();
		}
		else
		{
			$postManager = new PostManager(); 
			$UpdatedPost = $postManager->updatePost2($arrayParameters['title'], $arrayParameters['content'], $arrayParameters['categories'], $arrayParameters['id']); 
			$this->admin();
		}
	}
	public function adminCategory ()
	{
		require 'view/frontend/adminCategory.php';
	}
	public function adminAddCategory ($arrayParameters)
	{
		$AdminManager = new AdminManager(); 
		$addCategory = $AdminManager->addCategory($arrayParameters['categoryName']); 
	}
	public function adminDeleteCategory($arrayParameters)
	{
		$AdminManager = new AdminManager(); 
		$AdminManager->deleteCategory($arrayParameters['categoryName']); 
	}
	public function adminReadCategory()
	{
		$AdminManager = new AdminManager(); 
		$readCategory = $AdminManager->readCategory(); 
	}
	public function adminUpdatingPostData($arrayParameters)
	{
		$postManager = new PostManager(); 
		$UpdatedPost = $postManager->getUpdatingPost($arrayParameters['id']); 
	}	
}