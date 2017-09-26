<?php
include_once "./dbconnect.php";

if(isset($_GET['page'])){
	$page = (int)$_GET['page'];
}else{
	$page =1;
}

$numView = 50;

$firstLimitValue = ($numView * $page) - $numView;

$sql = "SELECT * FROM myMember LIMIT {$firstLimitValue}, {$numView}";
$result = $dbConnect->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>고객 리스트</title>
	<style>
		table{font-size:10px;}
	</style>
</head>
<body>
	<h3>고객 리스트</h3>
	<table width="100%" bgcolor="skyblue" cellspacing="1">
		<tr bgcolor="white" align="center">
			<td>번호</td>
			<td>ID</td>
			<td>이름</td>
			<td>이메일</td>
			<td>성별</td>
			<td>가입일</td>
		</tr>
 
<?php
for($i=0;$i< $result->num_rows; $i++){
	$member = $result->fetch_array(MYSQLI_ASSOC);
?>
	<tr bgcolor="white" align="center">
		<td><?=$member['myMemberID']?></td>
		<td><?=$member['userId']?></td>
		<td><?=$member['name']?></td>
		<td><?=$member['email']?></td>
		<td><?=(($member['gender']=='w')? '여성':'남성')?></td>
		<td><?=$member['regTime']?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>