var categoryAdmin = 
{
	categoryContent: "",
	
	init: function ()
	{
		this.displayCategory(); 
		this.displayContentErase(); 
		this.displayContentAdd(); 
	},
	loadData: function ()
	{		
		$(".test").append("<div class='loading'>frfrf</div>"); 
		$(".loading").css({"background" : "url(/public/images/assets/ajax_loader.gif)","display" : "none","border": "solid re","position":"absolute","zIndex":"10","backgroundSize":"35px 35px","width":"40px","height":"40px","left": "45%","top":"25%","backgroundRepeat":"no-repeat"});
		var that = this; 
		$.ajax(
		{	
			type: "GET",
			url: "/index.php?action=adminReadCategory",
			success: function(data)
			{
				that.categoryContent = data;
				$(".test .divCategoryList #category").append(that.categoryContent);
			}
		});
	},
	displayCategory: function ()
	{
		$(".test .divCategoryList").empty();
		$(".test .divCategoryList").append('<label for="pays">Choisir une catégorie: </label><select name="categories" id="category"><option value="">Pas de catégorie </option></select>');
		this.loadData(); 
	},		
	displayContentErase: function ()
	{
		$(".test .divCategoryErase").empty();											
		$(".test .divCategoryErase").append('<input type="button" class="buttonDeleteCategory" value="erase">');											
		var that = this;
		$("body").on("click",".buttonDeleteCategory",function()
		{
			var contentDelete = $('.test .divCategoryList #category option:selected').val();	
			that.adminDeleteCategory(contentDelete);
			$( "body").unbind();
		});
	},	
	displayContentAdd: function ()
	{			
		$(".test .divCategoryAdd").append('<div class="adminCreateCategory"><label for="title">Ajouter une catégorie: </label><input type="text" id="categoryName" name="" placeholder=""/><button id="buttonCategory">Valider</button></div>');								
		var that = this; 
		$("#buttonCategory").on("click", addCategory);
		function addCategory () 
		{
			var inputContent = $("#categoryName").val();
			$("#categoryName").val(" ");	
			that.addCategory(inputContent);
		};
	},
	addCategory: function (inputContent)
	{
		this.AjaxStart();
		var that = this; 
		$.ajax(
		{
			type: "GET",
			url: "/index.php?action=adminAddCategory",
			data: {categoryName: inputContent},
			success: function()
			{
				that.displayCategory();
				that.displayContentErase();
			}
		});
		this.AjaxStop();
	},
	adminDeleteCategory: function (contentDelete)
	{				
		this.AjaxStart();
		var that = this;
		$.ajax(
		{
			type: "GET",
			url: "/index.php?action=adminDeleteCategory",
			data: {categoryName: contentDelete},
			success: function()
			{
				that.displayCategory();
				that.displayContentErase();	
			}
		});
		this.AjaxStop();
	},
	AjaxStart: function ()
	{
		$(document).ajaxStart(function() 
		{
			$(".loading").show();
		});
		
	},
	AjaxStop: function ()
	{
		$(document).ajaxStop(function() 
		{
			$(".loading").hide();
			$(".loading").empty();
		});
	}
}			
	var categoryAdmin1 = Object.create(categoryAdmin);		
	categoryAdmin1.init();