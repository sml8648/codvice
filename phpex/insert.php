<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>using for select tag</title>
</head>
<body>
<?php
include_once "./dbconnect.php";

$userId = "miu0709";
$name = "김미우";
$userPW = "aldn";
$phone = "010-1234-5678";
$email = "kmu07@everdevel.com";
$gender = "w";

$sql = "INSERT INTO myMember(userId, name, password, phone, email, gender, regTime) VALUES";
$sql .="('{$userId}','{$name}','{$userPW}','{$phone}','{$email}','{$gender}',now())";

$result = $dbConnect->query($sql);

if($result){
	echo "데이터 입력 완료";
}else{
	echo "데이터 입력 실패";
}
?>
</body>
</html>