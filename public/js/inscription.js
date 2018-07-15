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
		$('#confirmation2-text').fadeOut(6000);
		$('#confirmation-text').append(content).css('color',colorText);
	},
	displayMarkerSuccess: function (whatInput, variableState)
	{
		$('#'+whatInput).css("visibility",variableState);
	},	
	checkSql: function ()
	{
		var that = this;
		$('#pseudo').keyup(function(e)
		{
			e.preventDefault();		
			var value = $(this).val(); 
			$.ajax(
			{
				type: "POST",
				url: "/index.php?action=checkPseudo",
				data: {'user' : value},
				dataType: "text",
				success: function(data)
				{
					if (data == 0)
					{
						that.$pseudoAjaxVariable = true; 
						var content = "Ce pseudo est disponible !";
						var colorText = "green";
						that.writeConfirmationText(content, colorText);
					}
					else
					{
						that.$pseudoAjaxVariable = false; 
						var content = "Désolé ! Ce pseudo existe déjà";
						var colorText = "red";
						that.writeConfirmationText(content, colorText);
						that.displayMarkerSuccess('pseudo-checked', 'hidden');	
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
				url: "/index.php?action=checkMail",
				data: {'mail' : value},
				dataType: "text",
				success: function(data)
				{
					if (data == 1)
					{
						var content = "Désolé ! Ce mail existe déjà !";
						var colorText = "red";
						that.writeConfirmationText(content, colorText);
						that.displayMarkerSuccess('mail-checked', 'hidden');	
					}
					else
					{	
						var content = "";
						var colorText = "";
						that.writeConfirmationText(content, colorText);
						that.displayMarkerSuccess('mail-checked', 'visible');	
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
				that.displayMarkerSuccess('pseudo-checked', 'visible');	
				if ($(this).val().length > 1)
				{
					var content = "";
					var colorText = "";
					that.writeConfirmationText(content, colorText);
					that.$counterPseudo--;
				}					
			}
			else if($(this).val().length < 1)
			{
				that.$pseudoInputVariable = false;
				that.displayMarkerSuccess('pseudo-checked', 'hidden');	
				if (that.$counterPseudo < 1)
				{	
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
					that.displayMarkerSuccess('mdp-checked', 'hidden');	
					$('#confirmation').prop('disabled', true);
					$('#confirmation').val('');
					$('#confirmation').css(
					{ 
						borderColor : 'black',
						borderWidth : '2px',
						borderRadius : '4px',
						backgroundColor : 'white',
						color : 'black'
					});	
					that.displayMarkerSuccess('confirmation-checked', 'hidden');	

						if ($(this).val().length > 1 && that.$counterMdp < 1 ) 
						{	
							var content = "Ecrivez un mot de passe plus long";
							var colorText = "red";
							that.writeConfirmationText(content, colorText);							
							that.displayMarkerSuccess('confirmation-checked', 'hidden');	
							that.$counterMdp++;
						}	
				 }
				 else if ($(this).val().length >= 5)
				 {
					 $(this).css({color : 'green'});
					that.displayMarkerSuccess('mdp-checked', 'visible');	
					$('#confirmation').prop('disabled', false);
					if ($(this).val().length > 4)
					{
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
			 $('#confirmation').keyup(function()
			 {
				if($(this).val() != $('#mdp').val())
				{  
					$(this).css({ borderColor : 'red', borderWidth : '2px', borderRadius : '4px', backgroundColor : '#F5B7B1', color : 'black'});	
					$('#confirmation-checked').css("visibility","hidden");
					if ($(this).val().length > 1 && that.$counterConfirm < 1 ) 
					{	
						var content = "Réécrivez votre mot de passe identique";
						var colorText = "red";
						that.writeConfirmationText(content, colorText);
						that.$counterConfirm++;
					}	
				}
				else
				{
					$(this).css({ borderColor : 'green', color : 'black', borderWidth : '2px', borderRadius : '4px', backgroundColor : '#ABEBC6'});				
					$('#confirmation-checked').css("visibility","visible");
					that.$counterConfirm--;
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
			// var pattern = new RegExp("#^.+@.+\..+#");
			// var pattern = new RegExp("/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/");
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
		$('#pseudo').keyup(function()
		{
			if ($(this).val().length > 1 )
			{	
				$('#mdp').keyup(function()
				{
					if ($(this).val().length >= 5 )
					{		
						$('#confirmation').keyup(function()
						{
							if ($(this).val().length >= 5 )
							{	
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