<?php
require_once('ConnectDbase.php');

class CommentManager extends ConnectDbase
{	
	public function postUpdateComment($id, $author, $comment)
	{
		$db = $this->dbConnect();
		$update = $db->prepare('UPDATE comments SET comment=?, author=? WHERE id=?');
		$updateComment = $update->execute(array($comment, $author, $id));
		return $updateComment;
	}
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, admin_comment, pseudo_id, redFlag, likes, dislike, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$req->execute(array($postId));
		$comments = $req->fetchAll();
		$req->closeCursor();
		return $comments;
	}
	public function getComments2($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT author, comment FROM comments WHERE id=?');
		$req->execute(array($postId));
		$comments = $req->fetchAll();
		$req->closeCursor();
		foreach ($comments as $data)
		{
			echo (json_encode($data));
		}		
		return $comments;
	}
	public function getAllComments()
	{
		$db = $this->dbConnect();
		$allComments = $db->prepare('SELECT posts.title AS title, comments.id AS id, comments.redFlag, comments.comment, comments.dislike, comments.post_id, comments.author, DATE_FORMAT(comments.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments, posts GROUP BY comments.id ORDER BY redFlag DESC');
		$allComments->execute(array());
		return $allComments;
	}
	public function postComment($pseudoId, $postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(pseudo_id, post_id, author, comment, comment_date) VALUES(?, ?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($pseudoId, $postId, $author, $comment));
		return $affectedLines;
	}
	public function opinionCommentLike($CommentId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET likes=likes+1 WHERE id=?');
		$opinionComment = $req->execute(array($CommentId));
		$req->closeCursor();
		return $opinionComment;
	}	
	public function opinionCommentDislike($CommentId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET dislike=dislike+1 WHERE id=?');
		$opinionComment = $req->execute(array($CommentId));
		$req->closeCursor();
		return $opinionComment;
	}	
	public function opinionredFlag($CommentId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET redFlag=redFlag+1 WHERE id=?');
		$opinionComment = $req->execute(array($CommentId));
		$req->closeCursor();
		return $opinionComment;
	}	
	public function eraseComment($id)
	{
		$db = $this->dbConnect();
		$erase = $db->prepare('DELETE FROM comments WHERE id = ?');
		$eraseComment = $erase->execute(array($id));
		return $eraseComment;
	}
	public function acceptComment($id)
	{
		$adminComment = TRUE; 
		$db = $this->dbConnect();
		$accept = $db->prepare('UPDATE comments SET admin_comment=? WHERE id=?');
		$acceptComment = $accept->execute(array($adminComment, $id));
		return $acceptComment;
	}
	public function refuseComment($id)
	{
		$adminComment = FALSE; 
		$db = $this->dbConnect();
		$refuse = $db->prepare('UPDATE comments SET admin_comment=? WHERE id=?');
		$refuseComment = $refuse->execute(array($adminComment, $id));
		return $refuseComment;
	}	
	public function erasePostComments($id)
	{
		$db = $this->dbConnect();
		$erase = $db->prepare('DELETE FROM comments WHERE post_id = ?');
		$eraseComment = $erase->execute(array($id));
		return $eraseComment;
	}
}