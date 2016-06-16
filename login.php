<?php
include "webservice/connection.php";

if(isset($_POST["userid"]) && isset($_POST["password"]))
    {
        $userid = $_POST["userid"];
        $password = $_POST["password"];
		
								try{
								$sql_select="select * from staff where username = :username and password =:password";
								$stmt = $conn->prepare($sql_select);
								$stmt->bindParam("username",$userid);
								$stmt->bindParam("password",$password);
								$stmt->execute();
								$row = $stmt->fetch(PDO::FETCH_ASSOC);
									if(!$row)
									{
									echo '<script>alert("Invalid Username or Password");</script>';
									//header('Location: index.php');
									}
									else
									{
										//$_SESSION["login"] = 1;
										header('Location: addthemespage.php');
									}
								}
								catch(PDOException $e) {
										echo "Error: " . $e->getMessage();
									}
    }
	else
	{
		//header('Location: index.php');
	}		
									
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>13D Research</title>
<link rel="stylesheet" href="css/bootstrap.css">

<script>
localStorage.callgetip = 1;
</script>


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
<input type=text required  class="form-control" id="login_email" name="userid" placeholder="Login"  >
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
<button style="margin-top:12px;" type="submit" class="btn btn-lg btn-primary btn-block" id="loginBtn" >Login</button></div></div>
</form>
</div> </div>
</section>
</body>
</html>
