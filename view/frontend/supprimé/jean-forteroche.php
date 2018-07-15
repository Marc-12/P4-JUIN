<?php 
session_start();
ob_start(); 
?>
<h1><a href="../../index.php">Billet simple pour l'Alaska</a></h1>

<h2>Espace d'administration</h2><p>Créez, modifier ou effacez des articles, modérez les commentaires de vos lecteurs</p>



<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
