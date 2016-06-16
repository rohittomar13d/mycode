<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-*.min.js"></script>

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
      <li><a href="addthemespage.php">Add Theme</a></li>
      <!--<li><a href="editdelete.php">Edit Theme</a></li>-->
	  <li class="active"><a href="addmodifytheme.php">Edit Theme</a></li>
	  <li><a href="login.php">LogOut</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <h2>Theme List</h2>
  <form role="form">
    <div class="form-group">
      <label for="sel1">Select list (select one):</label>
      <select class="form-control" id="sel1" background: yellow !important;color:#000;text-shadow:0 1px 0 rgba(0, 0, 0, 0.4);>
	  <option value="0">Select Theme</option>
      </select>
	  
<br>
<input class="form-control" id="themetext" type="text" disabled>
<button type="button" class="btn btn-default" id="textboxenable">Edit</button>
<button type="button" class="btn btn-default" id="editbutton">Make Change</button>
<button type="button" class="btn btn-default" id="deletebutton">Delete Theme</button>
    </div>
  </form>
</div>
<script>
 var appenddata;
$(document).ready(function() { 
			$("#editbutton").hide();
            $("#deletebutton").hide();    
		   $.ajax({
           type       : "POST",
           url        : "http://development.13d.com/alter_themes/webservice/getthemes.php",
           data       : {},
		   //dataType   : "json",
		   crossDomain: true,
           success    : function(response) {
			  
		  if(response.length>0)
		  {  
            $("#sel1").append(response);
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
		   
			$('#sel1').on('change', function() {
 
				$( "#themetext").val($( "#sel1 option:selected" ).text());
 
			});
		    
			
            });
			
			$("#textboxenable").click(function(){
			alert("This will make the text box editable");
			$("#themetext").prop('disabled', false);
			$("#textboxenable").hide();
			$("#editbutton").show();
			$("#deletebutton").show();
			});
			
			$("#editbutton").click(function(){
				
				$.ajax
				({
				
				url 		: "http://development.13d.com/alter_themes/webservice/edittheme.php",
				
				data 		: {"themeid":$( "#sel1 option:selected" ).val(),"themetext":$("#themetext").val()},
				dataType   	: "json",
				success 	: function(response){
					alert("Theme updated");
					window.location="addmodifytheme.php";
				},
				error  : function(request, status, error)
				{
					alert(request.responseText);
				} 
				});
			});
			
			
			
			$("#deletebutton").click(function(){
				$.ajax
				({
				
				url 		: "http://development.13d.com/alter_themes/webservice/deletetheme.php",
				
				data 		: {"themeid":$( "#sel1 option:selected" ).val(),"themetext":$("#themetext").val()},
				dataType   	: "json",
				success 	: function(response){
					alert("Theme updated");
					window.location="addmodifytheme.php";
				},
				error  : function(request, status, error)
				{
					alert(request.responseText);
					
				} 
				});
			});
			
</script>
</body>
</html>
