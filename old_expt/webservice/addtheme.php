<?php
include "connection.php";
header("Access-Control-Allow-Origin : *");
header("Content-Type : application/Json");
$theme_name=$_REQUEST["theme_name"];
$return_data=array();
$sql_check="select * from themes where theme = :theme";
$sqlcheckstmt=$conn->prepare($sql_check);
$sqlcheckstmt->bindParam("theme",$theme_name);
$sqlcheckstmt->execute();
$row = $sqlcheckstmt->fetch(PDO::FETCH_ASSOC);
if(!$row)
{
	$sql_insert="insert into themes(theme) values(:theme)";
	$sqlinsertstmt=$conn->prepare($sql_insert);
	$sqlinsertstmt->bindParam("theme",$theme_name);
	$sqlinsertstmt->execute();
	$return_data=["status"=>$conn->lastInsertId()];
}
else
{
	$return_data=["status"=>0];
}
echo json_encode($return_data);
?>