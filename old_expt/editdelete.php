<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
      <li class="active"><a href="addthemes.php">Add Theme</a></li>
      <li><a href="editdeletetheme.php">Edit Theme</a></li>
	  <li><a href="logout.php">LogOut</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <h2>Theme List</h2>
</div>
<div class="container" id="mydiv">
</div>
<script>
 var appenddata;
$(document).ready(function() {   
               
		   $.ajax({
           type       : "POST",
           url        : "themes.php",
           data       : {},
		   //dataType   : "json",
		   crossDomain: true,
           success    : function(response) {
			  
		  if(response.length>0)
		  {  
            $("#mydiv").append(response);
		  }
		  else
		  {
			  alert("Incorrect Username Or Password");
		  }
           },
           error      : function() {
           alert('Some Error occurred Plese Try Again Later!!!...');
           }
           });
		   
		   });
		   function edittheme(clickedbutton)
		   {
			   var themeid=$(clickedbutton).attr('themeid');
			   var idfortextbox='#'+themeid;
			   var themetext=$(idfortextbox).val();
			   $.ajax({
           type       : "POST",
           url        : "edittheme.php",
           data       : {"themeid":themeid,"themetext":themetext},
		   dataType   : "json",
		   crossDomain: true,
           success    : function(response) {
			  
		  if(response.length>0)
		  {  
            alert("Theme Updated");
			 window.location="editdelete.php";
		  }
		  else
		  {
			  alert("Incorrect Username Or Password");
		  }
           },
           error      : function() {
           alert('Some Error occurred Plese Try Again Later!!!...');
           }
           });
		   }
		   function deletetheme(clickedbutton)
		   {
			   var themeid=$(clickedbutton).attr('themeid');
			   var idfortextbox='#'+themeid;
			   var themetext=$(idfortextbox).val();
			   $.ajax({
           type       : "POST",
           url        : "deletetheme.php",
           data       : {"themeid":themeid,"themetext":themetext},
		   dataType   : "json",
		   crossDomain: true,
           success    : function(response) {
			  
		  if(response.length>0)
		  {  
            alert("Theme Deleted");
			window.location="editdelete.php";
		  }
		  else
		  {
			  alert("Incorrect Username Or Password");
		  }
           },
           error      : function() {
           alert('Some Error occurred Plese Try Again Later!!!...');
           }
           });
		   }
</script>
</body>
</html>
