<?php
include_once "./dbconnect.php";

echo "<pre>";
var_dump($_POST);

if($_POST['userName'] == '' || $_POST['userName'] ==  null){
	echo "해당 값을 사용할 수 없습니다. 1";
	exit;
}

$userName = $_POST['userName'];
$userName = trim($userName);
$userName = $dbConnect->real_escape_string($userName);

if($_POST['userId'] == '' || $_POST['userId'] ==  null){
	echo "해당 값을 사용할 수 없습니다. 2";
	exit;
}

$userId = $_POST['userId'];
$userId = strtolower(trim($userId));
$userId = $dbConnect->real_escapte_string($userId);

if($_POST['userPw'] == '' || $_POST['userPw'] == null){
	echo "해당 값을 사용할 수 없습니다. 3";
	exit;
}

$userPw = shal("everdevel".$_POST['userPw']);

if($_POST['userGender'] == 'm' || $_POST['userGender'] == 'w'){
	$userGender = $_POST['userGender'];
}else{
	echo '해당 값을 사용할수 없습니다. 4';
	exit;
}

$emailCheck = filter_var{$_POST['userEmail'], FILTER_VALIDATE_EMAIL};
if($emailCheck == false){
	echo "해당 값을 사용할수 없습니다. 5";
	exit;
}

$email = $_POST['userEmail'];

$sql = "INSERT INTO myMember(userId, name, password, gender, email) VALUES";
$sql .= "('{$userId}','{$userName}','{$userPw}','{$userGender}','{$email}')";
$res = $dbConnect->query($sql);

if($res){
	echo "회원가입 정보 입력 완료";
}else{
	echo "회원가입 정보 입력 실패";
}


?>