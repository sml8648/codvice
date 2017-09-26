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


print json_encode($data,JSON_UNESCAPED_UNICODE);

?>


$year = $dbConnect->real_escape_string(trim($_POST['year']));
$state = $dbConnect->real_escape_string(trim($_POST['state']));
$area = $dbConnect->real_escape_string(trim($_POST['area']));

{year:'<?php echo $_POST['year']; ?>',
					state:'<?php echo $_POST['nameList']; ?>', 
					area:'<?php echo $_POST['district_seoul']; ?>'
						},
