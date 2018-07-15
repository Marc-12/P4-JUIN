var commentAdmin =
{
	init: function ()
	{
		this.postOpinionComments();
		this.adminAcceptComments();
	},
	postOpinionComments: function ()
	{
		$(".buttonLike").on("click", buttonLikeClick);
		function buttonLikeClick() 
		{
				var id = $('.buttonLike').attr("href");
				jQuery.ajax(
				{
					type : "POST",
					url : "/index.php?action=commentOpinion?opinion=like?id=+id+",
					success : function()
					{
						//alert('success');
					}
				});
		}		
	},
	adminAcceptComments: function ()
	{
		$(".buttonAccept").on("click", acceptComment);
		function acceptComment() 
		{
			$(this).css("backgroundColor", "green");	
			$('.contentData').removeClass('buttonAccept');
			$(this).addClass('buttonAccept');
		}
		$(".buttonRefuse").on("click", refuseComment);
		function refuseComment() 
		{
			$(".contentData").css("backgroundColor", "red");
		}			
	}
};
var commentAdmin1 = Object.create(commentAdmin);		
commentAdmin1.init(); 