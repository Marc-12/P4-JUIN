<?php ob_start();  ?>
	<h3>Administration des Catégories</h3>
	<p>Vous pouvez ajouter / supprimer des catégories pour vos publications:</p>
	<div class="test">
		<div class="divCategoryList"></div>
		<div class="divCategoryErase"></div>
		<div class="divCategoryAdd"></div>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>


		