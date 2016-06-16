<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
      <li class="active"><a href="addthemes.php">Add Theme</a></li>
      <!--<li><a href="editdelete.php">Edit Theme</a></li>-->
	  <li><a href="addmodifytheme.php">Edit Theme</a></li>
	  <li><a href="login.php">LogOut</a></li>
    </ul>
  </div>
</nav>
<body style="background:#fff;">
<section class="form-horizontal">
<div class="container">
<div style="width:60%; margin:0 auto;">
<div class="clearfix">
<form action ="addthemes.php" method ="post">
<div class="col-lg-12 col-md-12">
<label for="theme_name"><span class="user">Theme Name</span></label>
<div class="input-group">
<div class="input-group-addon">
<span class=""></span></div>
<input type=text required  class="form-control" id="login_email" name="themename" placeholder=""  >
</div></div>

<div style="width:70%; margin:0 auto;">
<div class="col-lg-12 col-md-12">
<button style="margin-top:12px;" type="submit" class="btn btn-lg btn-primary btn-block" id="loginBtn" >Add Theme</button></div></div>
</form>
</div> </div>
</section>
</body>

</body>
</html>

<?php

include "webservice/connection.php";
if(isset($_POST["themename"]))
{
	$themename=$_POST["themename"];
	try
	{
		$sql_select="select * from themes where theme = :themename";
		$stmt = $conn->prepare($sql_select);
		//$sql_stmt = conn->prepare($sql_select);
		$stmt->bindParam("themename",$themename);
		$stmt->execute(); 
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(!$row)
		{
		$sql_insert="insert into themes(theme) values (:themename)";
		$stmt=$conn->prepare($sql_insert);
		$stmt->bindParam("themename",$themename);
		$stmt->execute();
		}
		else
		{
			echo "<script>alert('Theme already exist');</script>";
		}
		
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
		}
}

?>