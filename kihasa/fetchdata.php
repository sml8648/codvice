<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
include_once "./connectDB.php";

$query = sprintf("SELECT * from basic where year = $obj->year and state = '$obj->nameList' and area = '$obj->district'");

$result = $dbConnect->query($query);


$data = array();
foreach($result as $row){
	$data[] = $row;
}
$result->close();

$dbConnect->close();


echo json_encode($data,JSON_UNESCAPED_UNICODE);

?>
