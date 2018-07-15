var pageAdmin =
{
	postTitle: "titre",
	postContent: "contenu",
	
	init: function ()
	{
		this.adminClickCreatePost();
		this.adminClickUpdatePost();
	},
	adminClickCreatePost: function ()
	{
		var that = this; 
		$(".buttoncreatePost").on("click", divCreatePost);
		function divCreatePost() 
		{
			if ($(".DivCreatePost").css("height") == "0px") 
			{			
				$(".DivCreatePost").show();
				$(".DivUpdatePost").hide();
				$(".DivCreatePost").animate({"height": "600px"}, 100);
				$(".divForm .adminCreatePost").css({"display": "block","height": "100%"});	
				$(".DivCreatePost").css({"border": "solid gree","position": "relative","zIndex":"19",
			   "padding": "1%","background-color":"#b3d1ff","opacity":"0.9","marginBottom": "15px","marginTop": "15px"});									  
				$(".test .divCategoryList").show();
				$(".test ").css({"display": "block","border":"solid re","height": "10%"});				
			}
			else if ($(".DivCreatePost").css("height") == "600px") 
			{
				$(".adminCreateCategory").hide();						
				$(".DivCreatePost").css("height", "0px");
				$(".DivCreatePost").hide();	
				$(".test .divCategoryList").hide();
				$(".DivCreatePost").animate({"height": "0px"}, 100);
				$(".DivCreatePost").css("padding", "0px");
			}
		}
	},
	adminClickUpdatePost: function ()
	{
		var that = this;
		$('.buttonUpdatePost').click(function(e)
		{
			e.preventDefault();
			var URLValue = $(this).attr("href");				
			if ($(".DivUpdatePost").css("height") == "0px") 
			{
				$(".DivCreatePost").hide();
				URLValue = URLValue.split("id=").reverse();
				var URL = URLValue[0]
				$.ajax(
				{
					type: "POST",
					url: "/index.php?action=adminUpdatingPostData",
					data: {id: URL},
					dataType: "text",
					success: function(data)
					{
						var parsedJson = $.parseJSON(data);
						$(".adminUpdatePost #title").val(parsedJson.title);
						 tinyMCE.activeEditor.setContent(parsedJson.content);
					}
				});
				$(".adminUpdatePost").attr("action","/index.php?action=adminUpdatePost&id="+URL+"");
				$(".DivUpdatePost").show();
				$(".DivUpdatePost").css({"border": "solid re","padding": "1%", "marginTop": "10px","background-color":"#b3d1ff",
					"width": "100%","opacity":"0.8","marginBottom": "15px","marginTop": "15px"});	
				$(".DivUpdatePost").animate({"height": "600px"}, 100);
				$(".adminUpdatePost").css({"display": "block","height": "100%"});
				$(".test .divCategoryList").show();
				$(".test ").css({"display": "block","border":"solid re","height": "10%"});				
			}
			else if ($(".DivUpdatePost").css("height") == "600px") 
			{
				$(".DivUpdatePost").hide();
				$(".test .divCategoryList").hide();
				$(".DivUpdatePost").animate({"height": "0px"}, 100);
				$(".DivUpdatePost").css("height", "0px");
				$(".DivUpdatePost").css("padding", "0px");
			}
		});	
	}
};
	var pageAdmin1 = Object.create(pageAdmin);		
	pageAdmin1.init(); 		