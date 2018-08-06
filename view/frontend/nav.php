<!--<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
		@media(max-width: 768px)
		{
			.container-flui, .navbar-inverse
			{
				background-color: black;
			}
			.navbar
			{
				width: 100%;
				display: block;
				border: 3px solid gree;
				margin: 0px;
				padding: 0px;
			}
			.navbar-nav
			{
				width: 100%;
				margin: 0px;
				margin-top: 50px;
				border: solid re;
			}
				.navbar-nav li button
				{
					color: black;
				}
			.navbar-collapse
			{
				border: 1px solid gree;
				background-color: black;
				margin: 0px;
				padding: 2%;
			}
			/* NE PAS AFFICHER BUTTON ADMIN POUR ECRAN XS */
			.buttonAdminZone img
			{
				display: none;
			}
			.nav li
			{
				color: white;
				margin: 0px;
				width: 100%;
				height: 100%;
				border: solid whit 1px;
			}
			.buttonAdminZoneXS p
			{
				display: inline;
			}
			.container-fluid
			{
				display: flex; 
				flex-direction: row; 
				justify-content: end; 
				align-items: center; 	
				
			}
			.navbar-header
			{
				border: 2px solid re;
				margin-top: 0px;
				margin-right: 0px;
				padding: 2%;
				right: 0px;
				top: 0px;
				position: absolute;
				z-index: 344;
			}
		}
									
									
									@media(min-width: 769px)
									{
										.container-fluid, .navbar-inverse
										{
											background-color: rgba(0, 0, 0, 0);
											width: 100%;
											border: none;
											margin: 0px;
										}
										/* AFFICHAGE BUTTON ADMIN POUR ECRAN > XS (LG) */
										.buttonAdminZone
										{
											display: block;
										}
										.nav-link p 
										{
											color: white;
										}
										.buttonAdminZoneXS p 
										{
											display: none;
										}
										.navbar-nav li button
										{
											color: black;
										}
									}
	</style>
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" rel="tooltip" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="index.php"><img src="public/images/assets/home.png" ></a>
				  <!--<a class="navbar-brand" href="#"></a>	-->	
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
					<!--<li><a href="index.php">Accueil</a></li>-->
					<?php	
						if (isset($_SESSION['user']) == "admin")
						{
							echo '<li><a class="buttonAdminZone"><img src="public/images/assets/menu.png" ></a></li>';
							echo '<li><a href="index.php?action=admin" class="buttonAdminZoneXS"><p>Administration Posts / Commentaires</p></a></li>
								  <li><a href="index.php?action=adminCategory" class="buttonAdminZoneXS"><p>Administration catégories</p></a></li>';
						}	
						if (isset($_SESSION['pseudo']))
						{
							echo '<li><a>Vous êtes connecté-e en tant que: "'.$_SESSION['pseudo'].'" <button id="deconnectSession">Déconnexion</button></a></li>';
						}
						else
						{
							echo '<li><a>Vous n\'êtes pas connecté-e ! <button id="connectSession">Se connecter</button></a></li>';
							$_SESSION['redirectionPage'] = $_SERVER['REQUEST_URI']; 
						}
					?>
				  </ul>
				</div>
			  </div>
			</nav> 		 
		<div class="adminInfos"></div>
	  </div>
</nav>







