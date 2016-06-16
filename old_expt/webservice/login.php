<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$username=$_REQUEST["username"];
$password=$_REQUEST["password"];
try {
    $sql_select="select * from staff where username = :username and password =:password";
	$stmt = $conn->prepare($sql_select);
	$stmt->bindParam("username",$username);
	$stmt->bindParam("password",$password);
    $stmt->execute();
    foreach($stmt->fetchAll() as $k=>$v) { 
		$user=array('username'=>$v['username'], 'password'=>$v['password']);
		echo json_encode($user);
     }
	
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
