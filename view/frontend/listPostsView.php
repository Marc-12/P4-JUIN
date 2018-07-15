<?php 
// $title = 'Mon blog'; 
ob_start(); 
?>
<div class="news">	
  <div class="row">
	 <div class="post-preview">
		<?php	
			foreach ($posts as $data)
			{
				?>
				<div class="newsPost">
					<a href="index.php?action=post&amp;id=<?= $data['id']?> ">
						<h2 class="post-title"><?= html_entity_decode(htmlspecialchars($data['title'])) ?></h2>
						<div class="newsDate"><em>Publié par Jean Forteroche le <?= $data['creation_date_fr'] ?> </em></div>
						<img src="<?= $data['image_url']?>" class="imageClass" alt="" > 
						<p class="text-justify">
							<?php include_once "model/TextManager.php";
							$datas = (htmlspecialchars($data['content'])); 
							$textManager1 = new textManager();
							$textManager1->initSummary($datas);?>
						</p><br/>
						<p class="readMore text-center"><em><a href="index.php?action=post&amp;id=<?= $data['id']?> "> - en savoir plus - </a></em></p>
					</a>
				</div><hr>
				<?php
			}
		?>
	  </div><hr>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>