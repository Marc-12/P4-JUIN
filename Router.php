<?php

function initRouteur() 
{
	$array = array
	(
		//INSCRIPTION CONTROLER
		"inscriptionPage" => array(
		'controler' => 'InscriptionControler',
		'method' => 'inscriptionPage'
		),	
		"memberPage" => array(
		'controler' => 'InscriptionControler',
		'method' => 'memberPage'
		),	
		"checkPseudo" => array(
		'controler' => 'InscriptionControler',
		'method' => 'checkPseudo'
		),	
		"checkMail" => array(
		'controler' => 'InscriptionControler',
		'method' => 'checkMail'
		),	
		//CONNEXION CONTROLER
		"connexionPage" => array(
		'controler' => 'ConnexionControler',
		'method' => 'connexionPage'
		),
		"connectPage" => array(
		'controler' => 'ConnexionControler',
		'method' => 'connectPage'
		),
		"deconnectPage" => array(
		'controler' => 'ConnexionControler',
		'method' => 'deconnectPage'
		),
	    //POST CONTROLER
		"listPosts" => array(
		'controler' => 'PostControler',
		'model' => 'PostManager',
		'method' => 'listPosts'
		),
		"post" => array(
		'controler' => 'PostControler',
		'method' => 'post'
		),
		"commentOpinion" => array(
		'controler' => 'PostControler',
		'method' => 'commentOpinion'
		),
		//USER CONTROLER
		"addComment" => array(
		'controler' => 'UserControler',
		'method' => 'addComment'
		),
		"eraseComment" => array(
		'controler' => 'UserControler',
		'method' => 'eraseComment'
		),
		"updateCommentPage" => array(
		'controler' => 'UserControler',
		'method' => 'updateCommentPage'
		),
		"updateCommentContent" => array(
		'controler' => 'UserControler',
		'method' => 'updateCommentContent'
		),
		"getCommentToModify" => array(
		'controler' => 'UserControler',
		'method' => 'getCommentToModify'
		),
		//ADMIN CONTROLER
		"admin" => array(
		'controler' => 'AdminControler',
		'method' => 'admin'
		),
		"adminDeletePost" => array(
		'controler' => 'AdminControler',
		'method' => 'adminDeletePost'
		),
		"adminAcceptComment" => array(
		'controler' => 'AdminControler',
		'method' => 'adminAcceptComment'
		),
		"adminRefuseComment" => array(
		'controler' => 'AdminControler',
		'method' => 'adminRefuseComment'
		),
		"adminDeleteComment" => array(
		'controler' => 'AdminControler',
		'method' => 'adminDeleteComment'
		),
		"adminAddPost" => array(
		'controler' => 'AdminControler',
		'method' => 'adminAddPost'
		),
		"adminUpdatePost" => array(
		'controler' => 'AdminControler',
		'method' => 'adminUpdatePost'
		),
		"adminCategory" => array(
		'controler' => 'AdminControler',
		'method' => 'adminCategory'
		),
		"adminAddCategory" => array(
		'controler' => 'AdminControler',
		'method' => 'adminAddCategory'
		),
		"adminDeleteCategory" => array(
		'controler' => 'AdminControler',
		'method' => 'adminDeleteCategory'
		),
		
		"adminReadCategory" => array(
		'controler' => 'AdminControler',
		'method' => 'adminReadCategory'
		),
		"adminUpdatingPostData" => array(
		'controler' => 'AdminControler',
		'method' => 'adminUpdatingPostData'
		)
	); 
	return $array;
}