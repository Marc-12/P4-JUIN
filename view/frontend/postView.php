<?php ob_start(); ?>
		<div class="news">
			<div>
				<h2><?= htmlspecialchars($post['title']) ?></h2>
				<div class="newsDate"><em>Publié par Jean Forteroche le <?= $post['creation_date_fr'] ?> </em></div>
				<img src="<?= $post['image_url']?>" class="imageClass" alt="" > 
			</div>
			<p class="text-justify"><?= html_entity_decode($post['content']) ?></p><hr>
		</div>
		<h2>Commentaire(s) de l'article</h2>	

		<?php 
			if (isset($_SESSION['pseudo']))
			{
				echo ' Vous pouvez écrire, modifier ou supprimer un commentaire en tant que: "'.$_SESSION['pseudo'].'" :';
				echo '<form class="formComment" action="index.php?action=addComment&amp;id='.$post['id'].'" method="post">
						<div>
							<label for="author">Auteur</label><br />
							<input type="text" id="author" name="author" placeholder="'.$_SESSION['pseudo'].'"/>
						</div>
						<div>
							<label for="comment">Commentaire</label><br />
							<textarea id="comment" name="comment"></textarea>
						</div>
						<div>
							<input type="submit" />
						</div>
					</form><hr>'; 
			}
			else
			{
					$_SESSION['redirectionPage'] = $_SERVER['REQUEST_URI']; 
					echo '<br><a href="index.php?action=connectPage">Connectez-vous pour laisser un commentaire </a><a href="index.php?action=memberPage"> --- S\'inscrire</a><br><hr>';
			}
		?>							

<div class="commentDiv">
<?php
	foreach ($comments as $comment)
	{
		if ($comment['admin_comment'] == 1)
		{
			?>
				<br><p class="commentTitle"><u>Commentaire de: <strong><?= htmlspecialchars($comment['author']) ?></strong> - Le: <?= $comment['comment_date_fr'] ?></u></p>
			<?php
				if (isset($_SESSION['id'], $comment['pseudo_id']))
				{
					if ($_SESSION['id'] == $comment['pseudo_id'])
					{
						echo '(<a href="index.php?action=updateCommentPage&amp;id='.$comment['id'].'">modifier - </a>';
						echo '<a href="index.php?action=eraseComment&amp;id='.$comment['id'].'">supprimer</a>)';
						$_SESSION['redirectionPage'] = $_SERVER['REQUEST_URI']; 
					}
				}
				$_SESSION['redirectionPage'] = $_SERVER['REQUEST_URI']; 
				echo '<div class="buttonLikeDiv"><a class="" href="index.php?action=commentOpinion&amp;opinion=like&amp;id='.$comment['id'].'"><img src="public/images/assets/like.png" class="pngImages" alt="" ></a>'.$comment['likes'].'</div>';
				echo '<div class="buttonLikeDiv"><a class="" href="index.php?action=commentOpinion&amp;opinion=dislike&amp;id='.$comment['id'].'"><img src="public/images/assets/dislike.png" class="pngImages" alt="" ></a>'.$comment['dislike'].'</div>';
				echo '<div class="buttonLikeDiv"><a class="" href="index.php?action=commentOpinion&amp;opinion=redFlag&amp;id='.$comment['id'].'"><img src="public/images/assets/redflag.png" class="pngImages" alt="" ></a>'.$comment['redFlag'].'</div>';
		?>	
			<br><br><p class="commentComment"><i>"<?= nl2br(htmlspecialchars($comment['comment'])) ?>"</i></p><br>
 <?php }
		
	}?>
</div>
<?php 
	$content = ob_get_clean(); 
	require('template.php'); 
?>