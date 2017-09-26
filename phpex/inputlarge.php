<?php
include_once "./dbconnect.php";
$familyName = array();
$familyName = ['김','이','박','전','황','목','송','전','노','양','윤','고','최','조','백'];

$lastName = array();
$lastName = ['영중','유리','민후','유나','창인','기욱','해윤','미라','태진','혜진','미우'];

$gender = array();

$gender = ['m','w'];

$successCount = 0;

$failCount = 0;

for($i = 1; $i <= 500; $i++){
	$numRandomFN = rand(0,count($familyName) - 1);
	$numRandomLN = rand(0,count($lastName) - 1);
	$userGender = $gender[rand(0,1)];
	$userPw = sha1("haro39339393".rand(1,1000));
	
	$userName = $familyName[$numRandomFN].$lastName[$numRandomLN];
	
	$userId = "everdevel".rand(1,9999999);
	$email = "eve".rand(1,9999999)."@everdevel.com";
	
	$sql = "INSERT INTO myMember(userId, name, password, gender, email, regTime) VALUES";
	$sql .= "('{$userId}','{$userName}','{$userPw}','{$userGender}','{$email}', now())";
	$res = $dbConnect->query($sql);
	
	if($res){
		$successCount++;
	}else{
		$failCount++;
	}
		
}

echo "입력 성공 수 {$successCount}";
echo "<br />";
echo "입력 실패 수 {$failCount}";
?>