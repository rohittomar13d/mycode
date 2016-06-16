
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Theme Alter Tool</title>
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

<style type="text/css">
.user{
padding:5px;
    margin-bottom: 5px;
}
</style>

</head>

<body style="background:#fff;">
<section class="form-horizontal">
<div class="container">
<div style="width:60%; margin:0 auto;">
<div class="clearfix">
<form action ="index.php" method ="post">
<div class="col-lg-12 col-md-12">
<label for="users"><span class="user">UserID</span></label>
<div class="input-group">
<div class="input-group-addon">
<span class="glyphicon glyphicon-user"></span></div>
<input type=text required  class="form-control" id="login_id" name="userid" placeholder="Login"  >
</div></div>


<div class="col-lg-12 col-md-12">

<label for="pwd"><span class="pass">Password:</span></label>
<div class="input-group">
<div class="input-group-addon">
<span class="glyphicon glyphicon-lock"></span></div>
<input type=password required  class="form-control" name="password" id="login_password" placeholder="Enter password" required  >
</div></div>

<div style="width:70%; margin:0 auto;">
<div class="col-lg-12 col-md-12">
<button style="margin-top:12px;" type="button" class="btn btn-lg btn-primary btn-block" id="loginBtn" >Login</button></div></div>
</form>
</div> </div>
</section>
<script>
sessionStorage.login=0;
$("#loginBtn").click(function(){
	$.ajax({
		url:"http://development.13d.com/alter_themes/webservice/addtheme.php",
		crossDomain : true,
		dataType : "Json",
		data:{"userid":$("#login_id").val(),"password":$("#login_password").val()},
		success : function(response)
		{
			sessionStorage.login=1;
			window.location.href = 'addthemespage.php';
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
