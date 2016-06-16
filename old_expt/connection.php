<?php
		//global $conn;
		//global $chk;
		 $dbname = "13danalytics";
    /** MySQL database username */
    $username = "root";
    /** MySQL database password */
    $password = "Novel1012";
    /** MySQL hostname */
    $servername = "localhost";
        // Initialization
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	//echo $connpdo;
    //mysql_select_db(DB_NAME, $conn);
    //echo "connected";
    // disable reporting errors for security reason
    error_reporting(0);
	$chk=1;
	//echo $chk;
    // Error checking
    if(!$conn) {
        echo "\nPDO::errorInfo():\n";
    }
?>