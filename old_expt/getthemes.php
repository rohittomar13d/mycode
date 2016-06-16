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

$themearray=array();

	$sqlgetthemes = "SELECT id,theme FROM themes order by theme"; 
	$stmtgetthemes = $conn->prepare($sqlgetthemes);
	$stmtgetthemes->execute();
	
	 foreach($stmtgetthemes->fetchAll() as $k=>$v) 
	 { 	
		$themename="<option value = '".$v['id']." '>" .$v['theme']. "</option>";
		echo $themename;
		//array_push($themearray,$themename);
     }
//echo $themearray;	 	 
?>