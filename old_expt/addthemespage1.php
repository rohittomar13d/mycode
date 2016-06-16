<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
      <li class="active"><a href="addthemespage.php">Add Theme</a></li>
      <!--<li><a href="editdelete.php">Edit Theme</a></li>-->
	  <li><a href="addmodifytheme.php">Edit Theme</a></li>
	  <li><a href="login.php">LogOut</a></li>
    </ul>
  </div>
</nav>
 <script>
  function addtheme()
  {
	  var themename=$("#themename").val();
	  if(themename=="" || themename==null)
	  {
		  alert("Please enter a valid theme name");
	  }
	  else
	  {
	  $.support.cors = true;
	  $.ajax({
		  url:"http://development.13d.com/alter_themes/webservice/addtheme.php",
		  data:{"theme_name":themename},
		  crossDomain:true,
		  dataType: "json",
		  type:'POST',	
		  contentType: 'application/x-www-form-urlencoded',		  
		  success : function()
		  {
			  alert("Theme added");
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
	  }
}
  </script>
</head>
<body style="background:#fff;">
<section class="form-horizontal">
<div class="container">
<div style="width:60%; margin:0 auto;">
<div class="clearfix">
<!--<form action ="addthemes.php" method ="post">-->
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
<!--</form>-->
</div> </div>
</section>
</body>
</html>

