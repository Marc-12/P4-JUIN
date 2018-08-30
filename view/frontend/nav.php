<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	
<nav class=" navbar-inverse fixed-top" id="mainNav">
  <div class="container-fluid">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" rel="tooltip" data-target="#myNavbar">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="index.php"><img src="public/images/assets/home.png" alt="home-icone"></a>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">
			<?php	
				if (isset($_SESSION['user']) == "admin")
				{
					echo '<li><a class="buttonAdminZone"><img src="public/images/assets/menu.png" ></a></li>';
					echo '<li><a href="index.php?action=admin" class="buttonAdminZoneXS"><p>Administration Posts / Commentaires</p></a></li>
						  <li><a href="index.php?action=adminCategory" class="buttonAdminZoneXS"><p>Administration catégories</p></a></li>';
				}	
				if (isset($_SESSION['pseudo']))
				{
					echo '<li class="eraseAdmin"><a>Vous êtes connecté-e en tant que: "'.$_SESSION['pseudo'].'" <button id="deconnectSession">Déconnexion</button></a></li>';
				}
				else
				{
					echo '<li class="eraseAdmin"><a>Vous n\'êtes pas connecté-e ! <button id="connectSession">Se connecter</button></a></li>';
					$_SESSION['redirectionPage'] = $_SERVER['REQUEST_URI']; 
				}
			?>
		</ul>
	</div>
  </div>
</nav> 		 
<div class="adminInfos"></div>