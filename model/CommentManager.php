<?php

class CommentManager extends Manager
{	
	public function postUpdateComment($id, $author, $comment)
	{
		$db = $this->dbConnect();
		$update = $db->prepare('UPDATE comments2 SET comment=?, author=? WHERE id=?');
		$updateComment = $update->execute(array($comment, $author, $id));
		return $updateComment;
	}
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, admin_comment, pseudo_id, redFlag, likes, dislike, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comments2 WHERE post_id = ? ORDER BY comment_date DESC');
		$req->execute(array($postId));
		$comments = $req->fetchAll();
		$req->closeCursor();
		return $comments;
	}
	public function getComments2($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT author, comment FROM comments2 WHERE id=?');
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
		$allComments = $db->prepare('SELECT posts.title AS title, comments2.id AS id, comments2.redFlag, comments2.comment, comments2.dislike, comments2.post_id, comments2.author, DATE_FORMAT(comments2.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments2, posts GROUP BY comments2.id ORDER BY redFlag DESC');
		$allComments->execute(array());
		return $allComments;
	}
	public function postComment($pseudoId, $postId, $author, $comment)
    {
			$db = $this->dbConnect();
			$comments = $db->prepare('INSERT INTO comments2(pseudo_id, post_id, author, comment, comment_date) VALUES(?, ?, ?, ?, NOW())');
			$affectedLines = $comments->execute(array($pseudoId, $postId, $author, $comment));
			return $affectedLines;
	}
	public function opinionCommentLike($CommentId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments2 SET likes=likes+1 WHERE id=?');
		$opinionComment = $req->execute(array($CommentId));
		$req->closeCursor();
		return $opinionComment;
	}	
	public function opinionCommentDislike($CommentId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments2 SET dislike=dislike+1 WHERE id=?');
		$opinionComment = $req->execute(array($CommentId));
		$req->closeCursor();
		return $opinionComment;
	}	
	public function opinionredFlag($CommentId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments2 SET redFlag=redFlag+1 WHERE id=?');
		$opinionComment = $req->execute(array($CommentId));
		$req->closeCursor();
		return $opinionComment;
	}	
	public function eraseComment($id)
	{
		$db = $this->dbConnect();
		$erase = $db->prepare('DELETE FROM comments2 WHERE id = ?');
		$eraseComment = $erase->execute(array($id));
		return $eraseComment;
	}
	public function acceptComment($id)
	{
		$adminComment = 1; 
		$db = $this->dbConnect();
		$accept = $db->prepare('UPDATE comments2 SET admin_comment=? WHERE id=?');
		$acceptComment = $accept->execute(array($adminComment, $id));
		return $acceptComment;
	}
	public function refuseComment($id)
	{
		$adminComment = 0; 
		$db = $this->dbConnect();
		$refuse = $db->prepare('UPDATE comments2 SET admin_comment=? WHERE id=?');
		$refuseComment = $refuse->execute(array($adminComment, $id));
		return $refuseComment;
	}	
	public function erasePostComments($id)
	{
		$db = $this->dbConnect();
		$erase = $db->prepare('DELETE FROM comments2 WHERE post_id = ?');
		$eraseComment = $erase->execute(array($id));
		return $eraseComment;
	}
}