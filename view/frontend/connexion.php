<?php 
ob_start(); 
?>
<div id="form">
	<h1>Connexion à l'espace membre</h1>
	<form action="index.php?action=connexionPage" method="POST" autocomplete="off"><br>
		<label><input placeholder="Pseudo" type="text" value="" name="pseudo" /></label><br><br>
		<label><input placeholder="Mot de passe" type="password" value="" name="pass" /></label><br><br>
		<label>Pas encore membre ? <a href="index.php?action=memberPage">Cliquez ici !</a></label><br><br>
		<input type="submit" value="Se connecter" /><br><br>
	</form>
</div>	
<?php 
$content = ob_get_clean(); 
require('template.php'); 
?>


