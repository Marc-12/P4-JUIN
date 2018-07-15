<!DOCTYPE html>
<html>
    <head>
        <title>Blog - Td</title>
        <meta charset="utf-8" />
    </head>
    <body>
		<div id="page">
		
		<style>
		#form
		{
		margin-left: auto; 	
		margin-right: auto;
		padding: 25px 25px 25px 25px;
		width: 180px;
		height: 350px; 
		background-color: #e5e5e5; 
		}
		</style>
				<?php 
				session_start();
				$_SESSION = array();
				session_destroy();
				setcookie('login', '');
				setcookie('pass_hache', '');
				?>
		</div>
    </body>
</html>




