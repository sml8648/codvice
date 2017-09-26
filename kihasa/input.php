<?php
include_once "./connectDB.php";
include_once "./array.php";

$successCount = 0;
$failCount =0;


for($i=0; $i<3; $i++){
	if($state[$i] == '서울특별시'){
		for($j=0; $j<count($seoulArea); $j++){
			for($k=0; $k<count($year); $k++){
				
				$normal = rand(0,10000);
				$condition = rand(0,10000);
				$special = rand(0,10000);
				$etc = rand(0,10000);
				$facility = rand(0,10000);
				$sql = "INSERT INTO basic(state, area, year, 일반수급자, 조건부수급자, 특례수급자, 기타수급자, 시설수급자) VALUES";
				$sql .="('{$state[$i]}','{$seoulArea[$j]}','{$year[$k]}','{$normal}','{$condition}','{$special}','{$etc}','{$facility}')";
				$res = $dbConnect->query($sql);
				
				if($res){
					$successCount ++;
				}else{
					$failCount ++;
				}
					
			}
		}
	}else if($state[$i] == '부산광역시'){
		for($j=0; $j<count($pusanArea); $j++){
			for($k=0; $k<count($year); $k++){
				
				$normal = rand(0,10000);
				$condition = rand(0,10000);
				$special = rand(0,10000);
				$etc = rand(0,10000);
				$facility = rand(0,10000);
				$sql = "INSERT INTO basic(state, area, year, 일반수급자, 조건부수급자, 특례수급자, 기타수급자, 시설수급자) VALUES";
				$sql .="('{$state[$i]}','{$pusanArea[$j]}','{$year[$k]}','{$normal}','{$condition}','{$special}','{$etc}','{$facility}')";
				$res = $dbConnect->query($sql);
				
				if($res){
					$successCount ++;
				}else{
					$failCount ++;
				}
			}
		}
		
	}else if($state[$i] =='대구광역시'){
		for($j=0; $j<count($deaguArea); $j++){
			for($k=0; $k<count($year); $k++){
				
				$normal = rand(0,10000);
				$condition = rand(0,10000);
				$special = rand(0,10000);
				$etc = rand(0,10000);
				$facility = rand(0,10000);
				$sql = "INSERT INTO basic(state, area, year, 일반수급자, 조건부수급자, 특례수급자, 기타수급자, 시설수급자) VALUES";
				$sql .="('{$state[$i]}','{$deaguArea[$j]}','{$year[$k]}','{$normal}','{$condition}','{$special}','{$etc}','{$facility}')";
				$res = $dbConnect->query($sql);
				
				if($res){
					$successCount ++;
				}else{
					$failCount ++;
				}
			}
		}
		
	}
}
echo $successCount ++;
?>