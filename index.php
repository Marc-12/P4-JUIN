<?php
session_start();
include ('AutoLoader.php');
include ('Router.php');

if (isset($_GET['action']))
{
	$arrayParameters = array_merge($_GET, $_POST);
	$route = $arrayParameters['action'];
	$router = initRouteur();
	$myClass = ($router["".$route.""]["controler"]);			
	// unset($arrayParameters['action']);
	try 
	{
		 Autoloader::register();
		 $controleur1 = new $myClass();
		 $controleur1->$route($arrayParameters);
	} 
	catch (Exception $e) 
	{
		//traiter exception
		echo $e->getMessage ();
	}
}
else
{
	Autoloader::register();
	$controleur1 = new PostControler();
	$controleur1->listPosts();
}