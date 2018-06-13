<?php
class Autoloader 
{	
		 static function register()
		 {
		 	 spl_autoload_register(array(__CLASS__, 'autoload'));
		 }
		 static function autoload($class)
		 {
			 // on essaye de charger la bonne classe
			 if (strpos ($class, 'Manager') !== false)
			 {
				require './model/'.$class. '.php'; 
			 }
			 else
			 {
				require './controler/'.$class. '.php'; 				 
			 } 
		 }
		 // si fini par MANAGER
		 // inclure controler $class.php
		 
		 // require / nom_du_dossier_model/$class.php
}