<?php
if(!file_exists("connection.php")) 
{
	die("File not found");
}
else
{
	require_once("connection.php");
}

//header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$tab="<table class='table'><tbody>";
$tabend="</tbody></table class='table'>";
$themearray=array();
$themename;
	$sqlgetthemes = "SELECT id,theme FROM themes order by theme"; 
	$stmtgetthemes = $conn->prepare($sqlgetthemes);
	$stmtgetthemes->execute();
	
	 foreach($stmtgetthemes->fetchAll() as $k=>$v) 
	 { 
			//echo $v['theme']."<br>";
		$themename=$themename."<tr><td><input class='form-control' id=".$v['id']." type='text' value='".$v['theme']."'></td><td><button type='button' class='btn btn-default' onclick='edittheme(this)' themeid=".$v['id'].">Edit</button></td><td><button type='button' class='btn btn-default' onclick='deletetheme(this)'themeid=".$v['id'].">Delete</button></td></tr>";
     }
	 $tab=$tab.$themename.$tabend;
	 echo $tab;
//echo $themearray;	 	 
?>
