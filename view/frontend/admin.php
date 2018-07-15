<?php ob_start(); ?>

	<h2>Espace d'administration</h2><p>Créez, modifier ou effacez des articles et modérez les commentaires de vos lecteurs</p><br/>
		<button class="buttoncreatePost">+</button> <p> Créer un nouvel article</p>

	<div class="DivCreatePost">												
		<div class="divForm">
			<form class="adminCreatePost" action="index.php?action=adminAddPost" method="POST" enctype="multipart/form-data">
				<div>
					<label for="title">Sélectionner une image mise en avant: </label><br/>
					<input type="hidden" name="MAX_FILE_SIZE" value="10408576" />
					<input type="file" id="icone" name="image"/><br/><br/>
				</div>
				<div>
					<label for="title">Titre de l'article: </label>
					<input type="text" id="title" name="title"/><br/><br/>
				</div>
				<div>
					<label for="title">Contenu de l'article: </label><br/>
					<textarea class="DivTinyMce" name="content"></textarea>
				</div>
				<div>
					<input type="submit" value="Valider"/>
				</div>
				  <br/>
				<div class="test">
					<div class="divCategoryList"></div>
				</div>	
			</form>
		</div>	
	</div>						
	<script>tinymce.init({selector:'.DivTinyMce'});</script>
	<style>
		.adminCreatePost
		{
			display: none;
		}	
		.test
		{
			position: relative;
			display: none;
		}	
	</style>	
						
	<div class="DivUpdatePost">														
		<form class="adminUpdatePost" action="" method="POST" enctype="multipart/form-data">
			<div>
				<label for="title">Sélectionner une image mise en avant: </label><br/>
				<input type="hidden" name="MAX_FILE_SIZE" value="10408576" />
				<input type="file" id="icone" name="image"/><br/><br/>
			</div>
			<div>
				<label for="title">Titre de l'article: </label>
				<input type="text" id="title" name="title" placeholder=""/><br/><br/>
			</div>
			<div>
				<label for="title">Contenu de l'article: </label><br/>
				<textarea class="DivTinyMceUpdate" name="content" placeholder=""></textarea>
			</div>
			<div>
				<input type="submit" value="Valider"/>
			</div>
			<div class="test">
				<div class="divCategoryList"></div>
			</div>	
		</form>
	</div>
	<script>tinymce.init({selector:'.DivTinyMceUpdate', plugins: 'template'});</script>
	<style>
		.DivUpdatePos
		{
			display: none;
		}
		
		.adminUpdatePost
		{
			display: none;
		}
	</style>
	<div class="administrationArticles">	
	<h2>Mes articles</h2>
	<p>Dans cet espace vous pouvez créer, modifier ou effacer des articles et les mettre en ligne.</p>
	<?php		
		foreach ($posts as $data)
		{
			?>
				<div class="adminArticles">
					<div class="contentDate"><em> le <?= $data['creation_date_fr'] ?></em></div>
					<div class="contentData"><h4> Titre: <?= htmlspecialchars($data['title']) ?></h4></div>
					<div class="contentAction"><a class="buttonUpdatePost" href="index.php?action=adminUpdatePost&amp;id=<?= $data['id'] ?>">MODIFIER </a> ~ <a href="index.php?action=adminDeletePost&amp;id=<?= $data['id'] ?>"> EFFACER</a></div>			
				</div>
			<?php	
		}
	?>
	</div><br/>	

	<div class="administrationComments">
	<h2>Derniers commentaires du blog</h2>
	<p>Dans cet espace, modérez les commentaires de vos lecteurs : </p>
	<?php
		foreach ($allComments as $datas)
		{
			?>
				<div class="adminComments">
					<div class="contentDate">
						<h4> Auteur: </h4> <p><i><?= htmlspecialchars($datas['author']) ?></i></p></br>
						<h4> le: </h4> <i> <?= $datas['comment_date_fr'] ?></i>
						<h4 class="redFlag"> Red Flags: </h4><i class="redFlag"> <?= $datas['redFlag'] ?></i>					
					</div>
					<div class="contentData">
						<h4> a écrit dans l'article (<i><?= $datas['title'] ?></i>) le commentaire (n°<?= $datas['id'] ?>) suivant: </h4>
						<br><br><p>"<i><?= htmlspecialchars($datas['comment']) ?></i>"</p>
					</div>
					<div class="contentAction"><a class="buttonAccept" href="index.php?action=adminAcceptComment&amp;id=<?= $datas['id'] ?>">ACCEPTER </a> ~ <a class="buttonRefuse" href="index.php?action=adminRefuseComment&amp;id=<?= $datas['id'] ?>"> REFUSER</a></div>					
				</div>
			<?php
		}
	?>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>