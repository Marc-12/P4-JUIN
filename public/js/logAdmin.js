var LogAdmin =
{
	
	init: function ()
	{
		this.loginSession();
		this.adminAppendDiv();
	},
	loginSession: function  ()
	{
			$("#connectSession").on("click", connect);
			function connect() 
			{
				// window.location.replace("/index.php?action=connectPage");
				   // window.location = 'index.php?action=connectPage';
				   window.location = 'index.php?action=connectPage';
				   // window.location.replace("index.php?action=connectPage");
				// avec PROP ok fonctionne
				// $(location).prop('href', 'index.php?action=connectPage');
				  // var url = "/index.php?action=connectPage";
				 


				 // var url = "/index.php?action=connectPage";
                  // window.location.href = url; 
			}
			$("#deconnectSession").on("click", deconnect );
			function deconnect() 
			{
				jQuery.ajax(
				{
					type : "POST",
					url : "index.php?action=deconnectPage",	
					success : function()
					{
						location.reload();
					}
				});
			}	
	},
	adminAppendDiv: function ()
	{
		$(".buttonAdminZone").on( "click", adminInfos);
		function adminInfos() 
		{
			if ($(".adminInfos").css("height") == "0px") 
			{
				$(".adminInfos").animate({"height": "90px"}, 100);
				$(".adminInfos").css({"border": "solid red",
				"position": "absolute","padding": "1%","paddingLeft": "2%","width":"100%","border":"0px",
				"left":"0px","top": "80px","display": "block","background-color": "white","zIndex": "155"});
				$(".adminInfos").append('<a href="index.php?action=admin">Administration Posts / Commentaires</a><br/><div class="adminCategory"><a href="index.php?action=adminCategory">Administration catégories</a></div>');				
				$(".adminInfos a").css({"color": "black","fontSize":"18px"});
			}
			else if ($(".adminInfos").css("height") == "90px") 
			{
				$(".adminInfos").empty();
				$(".adminInfos").hide();
				$(".adminInfos").animate({"height": "0px"}, 100);
				$(".adminInfos").css("height", "0px");
				$(".adminInfos").css("padding", "0px");
				$(".adminInfos").css("boxShadow", "");
			}
		}
	}
};
	var LogAdmin1 = Object.create(LogAdmin);		
	LogAdmin1.init(); 