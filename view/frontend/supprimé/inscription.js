var FormValidator =
{
	$counterPseudo: 0,
	$counterConfirm: 0, 
	$counterMdp: 0, 
	$pseudoAjaxVariable: "", 
	$pseudoInputVariable: "", 
	
	loader: function ()
	{
		var that = this; 
		$(document).ready(function()
		{
			that.checkSql(); 			
			that.writeConfirmationText(); 
			that.displayMarkerSuccess();			
			that.pseudo();
			that.passWord(); 
			that.passWordConfirmation(); 		
			that.mail(); 
			that.submit();
			$('#confirmation').prop('disabled', true);
			$('#btn-submit').prop('disabled', true);

		});
	},
	writeConfirmationText: function (content, colorText)
	{
		$('#confirmation-text').empty();
		$('#confirmation-text').append(content).css('color',colorText);
	},
	displayMarkerSuccess: function (whatInput, variableState)
	{
		$('#'+whatInput).css("visibility",variableState);
		/*
		console.log('------>>>Input Variable --> '+this.$pseudoInputVariable);
		console.log('------>>>Ajax Variable  --> '+this.$pseudoAjaxVariable+'<<<--------');
		if (this.$pseudoInputVariable == true && this.$pseudoAjaxVariable == true)
		{
			$('#'+whatInput).css("visibility",variableState); 
		}
		else
		{
			$('#'+whatInput).css("visibility",variableState); 
		}
		*/
	},	
	checkSql: function ()
	{
		var that = this;
		$('#pseudo').keyup(function(e)
		{
			e.preventDefault();		
			var value = $(this).val(); 

			console.log(value);
			$.ajax(
			{
				type: "POST",
				url: "check.php",
				data: {'user' : value},
				dataType: "text",
				success: function(data)
				{
					if (data == 0)
					{
						that.$pseudoAjaxVariable = true; 
						console.log('AJAX pseudo valide');
						console.log('AJAX VALIDE etat variable: '+ that.$pseudoAjaxVariable);
						
						// display error message
						var content = "Ce pseudo est disponible !";
						var colorText = "green";
						that.writeConfirmationText(content, colorText);
					}
					else
					{
						that.$pseudoAjaxVariable = false; 
						console.log('AJAX pseudo non valide');
						console.log('AJAX INVALIDE etat variable: '+ that.$pseudoAjaxVariable);						
						
						// display error message
						var content = "Désolé ! Ce pseudo existe déjà";
						var colorText = "red";
						that.writeConfirmationText(content, colorText);
					}					
				}
			});
		}); 
		$('#mail').keyup(function(e)
		{
			e.preventDefault(); 
			var value = $(this).val();			
			$.ajax(
			{
				type: "POST",
				url: "check.php",
				data: {'mail' : value},
				dataType: "text",
				success: function(data)
				{
					if (data == 1)
					{
						// display error message
						var content = "Désolé ! Ce mail existe déjà !";
						var colorText = "red";
						that.writeConfirmationText(content, colorText);
					}
					else
					{	// display error message
						var content = "";
						var colorText = "";
						that.writeConfirmationText(content, colorText);
					}
				}
			});
		});		
	},
	pseudo: function (variable)
	{
		var that = this; 
		$('#pseudo').keyup(function(e)
		{	
			e.preventDefault();				
			if($(this).val().length > 1)
			{
				that.$pseudoInputVariable = true; 
				console.log('pseudoInputVariable: '+that.$pseudoInputVariable);

				// display success MARKER
				that.displayMarkerSuccess('pseudo-checked', 'visible');	
				if ($(this).val().length > 1)
				{
					// display error message
					var content = "";
					var colorText = "";
					that.writeConfirmationText(content, colorText);
					that.$counterPseudo--;
				}					
			}
			else if($(this).val().length < 1)
			{
				that.$pseudoInputVariable = false;
				console.log('pseudoInputVariable: '+that.$pseudoInputVariable);
				
				// display success MARKER
				that.displayMarkerSuccess('pseudo-checked', 'hidden');	
				
				if (that.$counterPseudo < 1)
				{	
					// display error message
					var content = "Ecrivez un pseudo plus long";
					var colorText = "red";
					that.writeConfirmationText(content, colorText);
					that.$counterPseudo++;
				}						
			}				
		}); 
	},
	passWord: function ()
	{
			var that = this; 
			$('#mdp').keyup(function()
			{
				if($(this).val().length < 5)
				{  			
					$(this).css({color : 'red'});
					// display success MARKER
					that.displayMarkerSuccess('mdp-checked', 'hidden');	
					
					$('#confirmation').prop('disabled', true);
					$('#confirmation').val('');
					
					//gestion bug CONFIRMATION MOT DE PASSE
					$('#confirmation').css(
					{ // on rend le champ rouge
						borderColor : 'black',
						borderWidth : '2px',
						borderRadius : '4px',
						backgroundColor : 'white',
						color : 'black'
					});	
					// display success MARKER
					that.displayMarkerSuccess('confirmation-checked', 'hidden');	

						if ($(this).val().length > 1 && that.$counterMdp < 1 ) 
						{	
							// display error message
							var content = "Ecrivez un mot de passe plus long";
							var colorText = "red";
							that.writeConfirmationText(content, colorText);							
							// display success MARKER
							that.displayMarkerSuccess('confirmation-checked', 'hidden');	
							that.$counterMdp++;
						}	
				 }
				 else if ($(this).val().length >= 5)
				 {
					 $(this).css({color : 'green'});
					 // display success MARKER
					that.displayMarkerSuccess('mdp-checked', 'visible');	
					$('#confirmation').prop('disabled', false);
					if ($(this).val().length > 4)
					{
						// display error message
						var content = "";
						var colorText = "";
						that.writeConfirmationText(content, colorText);	
						that.$counterMdp= 0;
					}	
				 }
			});
	},
	passWordConfirmation: function ()
	{			
			var that = this; 
			// CONFIRM PASSWORD
			 $('#confirmation').keyup(function()
			 {
				if($(this).val() != $('#mdp').val())
				{   // si la confirmation est différente du mot de passe
					$(this).css(
					{ // on rend le champ rouge
					borderColor : 'red',
					borderWidth : '2px',
					borderRadius : '4px',
					backgroundColor : '#F5B7B1',
					color : 'black'
					});	
					// IMG CONFIRMATION is "hidden"					
					$('#confirmation-checked').css("visibility","hidden");
					if ($(this).val().length > 1 && that.$counterConfirm < 1 ) 
					{	
						// display error message
						var content = "Réécrivez votre mot de passe identique";
						var colorText = "red";
						that.writeConfirmationText(content, colorText);
						that.$counterConfirm++;
					}	
				}
				else
				{
					$(this).css(
					{ // si tout est bon, on le rend vert
					borderColor : 'green',
					color : 'black',
					borderWidth : '2px',
					borderRadius : '4px',
					backgroundColor : '#ABEBC6'
					});				
					// IMG CONFIRMATION is "visible"					
					$('#confirmation-checked').css("visibility","visible");
					that.$counterConfirm--;
					// display error message
					var content = "";
					var colorText = "";
					that.writeConfirmationText(content, colorText);	
				}
			 });
	}, 
	mail: function ()
	{
		var that = this; 
		$('#mail').keyup(function()
		{
			var string = $('#mail').val();
			var pattern = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
			var checkedString = pattern.test(string);
			if( checkedString == true)
			{
				that.displayMarkerSuccess('mail-checked', 'visible');	
			}		
			else
			{
				that.displayMarkerSuccess('mail-checked', 'hidden');	
			} 	
		});
	},
	submit: function ()
	{
		//MANAGEMENT SUBMIT BUTTON --> activation 
		$('#pseudo').keyup(function()
		{
			if ($(this).val().length > 1 )
			{	
				//check password
				$('#mdp').keyup(function()
				{
					if ($(this).val().length >= 5 )
					{		
						//check password confirmation 
						$('#confirmation').keyup(function()
						{
							if ($(this).val().length >= 5 )
							{	
								//check mail
								$('#mail').keyup(function()
								{
									var string = $('#mail').val();
									var pattern = new RegExp("^[a-z]{4}");
									var checkedString = pattern.test(string);
									if( checkedString == true)
									{
										$('#btn-submit').prop('disabled', false);	
									}
									else
									{
										$('#btn-submit').prop('disabled', true);	
									}
								});
							}
						});					
					}
				});
			}
			else
			{
				$('#btn-submit').prop('disabled', true);			
			}
		});
	}
};
	var FormValidator1 = Object.create(FormValidator);		
	FormValidator1.loader(); 