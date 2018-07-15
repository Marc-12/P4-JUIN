<?php 
ob_start(); 
?>
<p><a href="index.php">Retour à la liste des posts</a></p>
						
<h2>Modifier le commentaire</h2>
<form class="formUpdateCommentView" action="index.php?action=updateCommentContent&amp;id=<?= $_GET['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author"/>
    </div>
	<div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div><br/><br/>
</form>
<script>
	var URLValue = document.URL;							
	URLValue = URLValue.split("id=").reverse();
	var URL = URLValue[0];
	console.log(URL);
	$.ajax(
	{
	   url: "/P4-VERSION5/index.php?action=getCommentToModify",
	   type: "GET",
	   data: { id: URL},
	   dataType: 'text',
	   success: function(data)
	   { 										
			var parsedJson = $.parseJSON(data);											
			$(".formUpdateCommentView #author").val(parsedJson.author);
			$(".formUpdateCommentView #comment").val(parsedJson.comment);										
	   },
	   error : function(data)
	   {
			console.log('AJAX error');
	   }
	});
</script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
				
				
			
	

