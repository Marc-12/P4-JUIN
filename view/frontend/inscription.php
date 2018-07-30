<?php ob_start(); ?>	
		<div id="form">
			<h1>Inscription à l'espace membre</h1>
			<form id="" action="index.php?action=inscriptionPage" method="POST" autocomplete="off">
				<input placeholder="Pseudo" id="pseudo" class="champ" type="text" value="" name="pseudo" /><img id="pseudo-checked" src="public/images/assets/checked.png" /><br><br>
				<input placeholder="Entrez un mot de passe" id="mdp" type="password" value="" name="pass" /><img id="mdp-checked" src="public/images/assets/checked.png" />
				<input placeholder="retapez votre mot de passe" id="confirmation" type="password" value="" name="pass2" /><img id="confirmation-checked" src="public/images/assets/checked.png" /><br><br>
				<input placeholder="Entrez votre email" id="mail" type="text" value="" name="mail" /><img id="mail-checked" src="public/images/assets/checked.png" /><br><br>
				<input id="btn-submit" type="submit" value="Valider" /><br>
				<div id="confirmation-text"></div><div id="confirmation2-text"></div>
			</form>						
		</div> 	
<?php
class Form
{
	  public $_check =  "";										
	  public $_content =  "";										
	
	  public function loader()
	  {
		  $this->getDataURL();
		  $this->checkPseudo();
		  $this->checkPasswords();
		  $this->checkPassWordLenght();
		  $this->checkMailSQL();
		  $this->checkMailREGEX();
	  }
	  public function getDataURL()
	  {
		  if (isset($_GET['check']))
		  {
				$this->_check = $_GET['check']; 							  
		  }
	  }
	  public function errorText()
	  {
				echo "<script>
					$('#confirmation2-text').empty();
					$('#confirmation2-text').append('".$this->_content."').css('color','red');
				</script>"; 
	  }
	  public function checkPseudo()
	  {
			if ($this->_check == 'pseudo')
			{
				$this->_content = "Désolé ! Ce pseudo existe déjà !"; 
				$this->errorText();
			}							
	  }
	  public function checkPasswords()
	  {
			if ($this->_check == 'pass')
			{
				$this->_content = "Les mots de passe ne sont pas identiques !"; 
				$this->errorText();
			}						
	  }  
	  public function checkPassWordLenght()
	  {
			if ($this->_check == 'passLenght')
			{
				$this->_content = "Mot de passe trop court. Ecrivez-en un de plus de 4 caractères."; 
				$this->errorText();
			}							
	  } 
	  public function checkMailREGEX()
	  {
			if ($this->_check == 'regex')
			{
				$this->_content = "Désolé ! Adresse mail invalide. Ecrivez-en une de la forme: abc@def.gh"; 
				$this->errorText();
			}	
	  } 
	  public function checkMailSQL()
	  {
			if ($this->_check == 'email')
			{
				$this->_content = "Désolé ! Ce mail existe déjà !"; 
				$this->errorText();
			}						
	  } 
}		
$form1 = new Form();
$form1->loader();		
$content = ob_get_clean(); 
require('template.php');
?> 