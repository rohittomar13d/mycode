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
$themeid = $_REQUEST['themeid'];
$themetext = $_REQUEST['themetext'];
$clients = array();
	$sqleditthemes = "update themes set theme = :themetext where id= :themeid"; 
	$stmteditthemes = $conn->prepare($sqleditthemes);
	$stmteditthemes->bindParam("themeid", $themeid);
	$stmteditthemes->bindParam("themetext", $themetext);
	if($stmteditthemes->execute())
	{
		 $clientname=array('updated'=>1);
		array_push($clients,$clientname);
		 echo json_encode($clients);
	}
		 	 
?>