<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	  <div class="container">
		<a class="navbar-brand" href="index.php"><img src="public/images/assets/home.png" ></a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
		  <ul class="navbar-nav ml-auto">
			<li class="nav-item">
			  <a class="nav-link" href="index.php">Accueil</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="index.php">A propos</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="index.php">Contact</a>
			</li>
			<?php	
			if (isset($_SESSION['user']) == "admin")
			{
				echo '<li class="nav-item"><a class="buttonAdminZone"><img src="public/images/assets/menu.png" ></a></li>';
			}
			?>
		   </ul>
		   <?php	
			if (isset($_SESSION['pseudo']))
			{
				echo ' <p>Vous êtes connecté-e en tant que: "'.$_SESSION['pseudo'].'</p>" <button id="deconnectSession">Déconnexion</button>';
			}
			else
			{
				echo ' Vous n\'êtes pas connecté-e ! <button id="connectSession">Se connecter</button>';
				$_SESSION['redirectionPage'] = $_SERVER['REQUEST_URI']; 
			}
		?>
		</div>
		<div class="adminInfos"></div>
	  </div>
</nav>