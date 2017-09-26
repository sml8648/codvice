<?php
header('Content-Type: application/json');

define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_NAME','mydb');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: ".$mysqli->error);
}	

$query = sprintf("SELECT userid, facebook, twitter, googleplus FROM sns");

$result = $mysqli->query($query);

$data = array();
foreach ($result as $row){
	$data[] = $row;
}

$result->close();

$mysqli->close();

print json_encode($data);
	
?>