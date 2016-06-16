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
<script>
if(sessionStorage.login==0)
{
	window.location.href="index.php";
}
</script>

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
      <li class="active"><a href="addthemespage.php">Add Theme</a></li>
      <!--<li><a href="editdelete.php">Edit Theme</a></li>-->
	  <li><a href="addmodifytheme.php">Edit Theme</a></li>
	  <li><a href="index.php">LogOut</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <form role="form">
 <div class="col-lg-12 col-md-12">
<label for="theme_name"><span class="user">Theme Name</span></label>
<div class="input-group">
<div class="input-group-addon">
<span class=""></span></div>
<input type=text required  class="form-control" id="themename" name="themename" placeholder=""  >
</div></div>
<div style="width:70%; margin:0 auto;">
<div class="col-lg-12 col-md-12">
<button style="margin-top:12px;" type="button" class="btn btn-lg btn-primary btn-block" id="loginBtn" onclick="addtheme()">Add Theme</button></div></div>
  </form>
</div>
<script>
 			$("#loginBtn").click(function(){
				
				$.ajax
				({
				
				url 		: "http://development.13d.com/alter_themes/webservice/addtheme.php",
				
				data 		: {"theme_name":$("#themename").val()},
				dataType   	: "json",
				success 	: function(response){
					alert("Theme added");
					//window.location="addmodifytheme.php";
				},
				error : function(xhr,textStatus,err)
		  {
			console.log("readyState: " + xhr.readyState);
			console.log("responseText: "+ xhr.responseText);
			console.log("status: " + xhr.status);
			console.log("text status: " + textStatus);
			console.log("error: " + err);
		  }
				});
			});
			
</script>
</body>
</html>
