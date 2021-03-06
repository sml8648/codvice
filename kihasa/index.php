<!DOCTYPE html>
<html>
<head>
	<title>statistics</title>
	<link rel="stylesheet" href="../cssReset.css" />
	<script type="text/javascript" src="../chart/Chart.min.js"></script>
	<script type="text/javascript" src="../jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="./bar.js"></script>
	<style>
		select{width:100px;height:px;}
		#district_seoul, #district_deagu, #district_pusan{
			display:none;
		}
		.chart-container{
			width:640px;
			height:auto;
		}
		#heid{
			background-color:red;
			width:200px;
			height:200px;
		}
		
		</style>
		<script>
			function district(obj){
				if(obj.value == '서울특별시'){
					$('#district_all').hide();
					$('#district_pusan').hide();
					$('#district_deagu').hide();
					$('#district_seoul').show();
				}
				if(obj.value == '부산광역시'){
					$('#district_all').hide();
					$('#district_seoul').hide();
					$('#district_deagu').hide();
					$('#district_pusan').show();
				}
				if(obj.value == '대구광역시'){
					$('#district_all').hide();
					$('#district_seoul').hide();
					$('#district_pusan').hide();
					$('#district_deagu').show();
				}
			}
		</script>
</head>
<body>
	<?php
	include_once "./connectDB.php";
	?>
	<h1>사회보장통계</h1>
	<form name="input_info" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="nameList">시</label>
		<select name="nameList" id="nameList" onchange="district(this)">
			<option value="전국">전국</option>
			<option value="서울특별시">서울특별시</option>
			<option value="부산광역시">부산광역시</option>
			<option value="대구광역시">대구광역시</option>
			<option value="인천광역시">인천광역시</option>
			<option value="광주광역시">광주광역시</option>
			<option value="대전광역시">대전광역시</option>
			<option value="울산광역시">울산광역시</option>
			<option value="세종특별자치시">세종특별자치시</option>
			<option value="경기도">경기도</option>
			<option value="강원도">강원도</option>
			<option value="충청북도">충청북도</option>
			<option value="충청남도">충청남도</option>
			<option value="전라북도">전라북도</option>
			<option value="전라남도">전라남도</option>
			<option value="경상북도">경상북도</option>
			<option value="경상남도">경상남도</option>
			<option value="제주특별자치도">제주특별자치도</option>
		</select>
		<label for="district_all">군구</label>
		<select name="district_all" id="district_all">
			<option value="시군구 전체">시군구 전체</option>
		</select>
		<select name="district_seoul" id="district_seoul">
			<option value="시군구 전체">시군구 전체</option>
			<option value="종로구">종로구</option>
			<option value="중구">중구</option>
			<option value="용산구">용산구</option>
			<option value="성동구">성동구</option>
			<option value="광진구">광진구</option>
			<option value="동대문구">동대문구</option>
			<option value="중랑구">중랑구</option>
			<option value="성북구">성북구</option>
			<option value="강북구">강북구</option>
			<option value="도봉구">도봉구</option>
			<option value="노원구">노원구</option>
			<option value="은평구">은평구</option>
			<option value="서대문구">서대문구</option>
			<option value="마포구">마포구</option>
			<option value="양천구">양천구</option>
			<option value="강서구">강서구</option>
			<option value="구로구">구로구</option>
			<option value="금천구">금천구</option>
			<option value="영등포구">영등포구</option>
			<option value="동작구">동작구</option>
			<option value="관악구">관악구</option>
			<option value="서초구">서초구</option>
			<option value="강남구">강남구</option>
			<option value="송파구">송파구</option>
			<option value="강동구">강동구</option>
		</select>
		<select name="district_pusan" id="district_pusan">
			<option value="시군구 전체">시군구 전체</option>
			<option value="중구">중구</option>
			<option value="서구">서구</option>
			<option value="동구">동구</option>
			<option value="영도구">영도구</option>
			<option value="부산진구">부산진구</option>
			<option value="동래구">동래구</option>
			<option value="남구">남구</option>
			<option value="북구">북구</option>
			<option value="해운대구">해운대구</option>
			<option value="사하구">사하구</option>
			<option value="금정구">금정구</option>
			<option value="강서구">강서구</option>
			<option value="연제구">연제구</option>
			<option value="수영구">수영구</option>
			<option value="사상구">사상구</option>
			<option value="기장구">기장구</option>
		</select>
		<select name="district_deagu" id="district_deagu">
			<option value="시군구 전체">시군구 전체</option>
			<option value="중구">중구</option>
			<option value="동구">동구</option>
			<option value="서구">서구</option>
			<option value="남구">남구</option>
			<option value="북구">북구</option>
			<option value="수성구">수성구</option>
			<option value="달서구">달서구</option>
			<option value="달성구">달성구</option>
		</select>
		<label for="year">년도</label>
		<select name="year" id="year">
			<option value="2016">2016년</option>
			<option value="2015">2015년</option>
			<option value="2014">2014년</option>
			<option value="2013">2013년</option>
		</select>
		<input type="submit" value="설정">
	</form>
	<?php
	$result;
	
	
	if(isset($_POST['nameList'])){
		echo $_POST['nameList'];
	}
	if(isset($_POST['nameList'])){
		$nameList = $_POST['nameList'];
		$district_seoul = $_POST['district_seoul'];
		$district_pusan = $_POST['district_pusan'];
		$district_deagu = $_POST['district_deagu'];
		$year = $_POST['year'];
		if($nameList == '서울특별시'){
			$sql = "SELECT * FROM basic where year = {$year} and state = '{$nameList}' and area = '{$district_seoul}'";
			$result = $dbConnect->query($sql);

		}else if($nameList == '부산광역시'){
			$sql = "SELECT * FROM basic where year = {$year} and state = '{$nameList}' and area = '{$district_pusan}'";
			$result = $dbConnect->query($sql);
		
		}else if($nameList == '대구광역시'){
			$sql = "SELECT * FROM basic where year = {$year} and state = '{$nameList}' and area = '{$district_deagu}'";
			$result = $dbConnect->query($sql);
		}
	}
	
	
	
	?>
	
	<h3>LIST</h3>
	<table width="100%" bgcolor="skyblue" cellspacing="1">
	<tr bgcolor="white" align="center">
		<td>ID</td>
		<td>state</td>
		<td>area</td>
		<td>year</td>
		<td>일반수급자</td>
		<td>조건부수급자</td>
		<td>특례수급자</td>
		<td>기타수급자</td>
		<td>시설수급자</td>
	</tr>
	
	<?php
	for($i = 0; $i < $result->num_rows; $i++){
		$member = $result->fetch_array(MYSQLI_ASSOC);
	?>
	<tr bgcolor="white" align="center">
		<td><?=$member['ID']?></td>
		<td><?=$member['state']?></td>
		<td><?=$member['area']?></td>
		<td><?=$member['year']?></td>
		<td><?=$member['일반수급자']?></td>
		<td><?=$member['조건부수급자']?></td>
		<td><?=$member['특례수급자']?></td>
		<td><?=$member['기타수급자']?></td>
		<td><?=$member['시설수급자']?></td>
	</tr>
	<?php } ?>
	</table>
	<input type="button" onclick="clickButton()" value="Graph">
	<script>	
		function clickButton(){
			var a = '<?php echo $_POST['nameList']; ?>';
			var b = '<?php echo $_POST['district_seoul']; ?>';
			var c = '<?php echo $_POST['year']; ?>';
			obj = {"nameList":a, "district":b, "year":c};
			console.log(obj);
			dbParam = JSON.stringify(obj);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					$('#heid').hide();
					document.getElementById("abcdef").innerHTML = this.responseText;
					var abc = [{"ID":"19","state":"서울특별시","area":"광진구","year":"2014","일반수급자":"7952","조건부수급자":"4512","특례수급자":"2078","기타수급자":"9184","시설수급자":"1845"}];
					console.log(typeof abc);
					console.log(typeof this.responseText);
					var edf = JSON.parse(this.responseText);
					console.log(typeof edf);
					var data = edf;
					console.log(data);
					
					
	
					var userid = [];
					var normal = [];
					var condition = [];
					var special = [];
					var etc = [];
					var facility = [];
	
					for(var i in data){
						userid.push(data[i].state + data[i].area + data[i].year);
						normal.push(data[i].일반수급자);
						condition.push(data[i].조건부수급자);
						special.push(data[i].특례수급자);
						etc.push(data[i].기타수급자);
						facility.push(data[i].시설수급자);
					}
			
					var chartdata = {
						labels: userid,
						datasets: [
							{
								label: "normal",
								backgroundColor: "rgba(0,0,0,0.75)",
								borderColor: "rgba(0, 0, 0, 1)",
								pointHoverBackgroundColor: "rgba(59,89,152,1)",
								pointHoverBorderColor: "rgba(59,89,152,1)",
								data : normal
							},
							{
								label: "condition",
								backgroundColor: "rgba(29,202,255,0.75)",
								borderColor: "rgba(29, 202, 255, 1)",
								pointHoverBackgroundColor: "rgba(29,202,255,1)",
								pointHoverBorderColor: "rgba(29,202,255,1)",
								data : condition
							},
							{
								label: "special",
								backgroundColor: "rgba(211,72,54,0.75)",
								borderColor: "rgba(211, 72, 54, 1)",
								pointHoverBackgroundColor: "rgba(211,72, 54,1)",
								pointHoverBorderColor: "rgba(211,72,54,1)",
								data : special
							},
							{
								label: "etc",
								backgroundColor: "rgba(234,98,3,0.75)",
								borderColor: "rgba(234, 98, 3, 1)",
								pointHoverBackgroundColor: "rgba(234,98, 3,1)",
								pointHoverBorderColor: "rgba(234,98,3,1)",
								data : etc
							},
							{
								label: "facility",
								backgroundColor: "rgba(129,189,75,0.75)",
								borderColor: "rgba(129, 189, 75, 1)",
								pointHoverBackgroundColor: "rgba(129, 189, 75,1)",
								pointHoverBorderColor: "rgba(129, 189, 75,1)",
								data : facility
							}
						]
					};
			
					var ctx = $("#mycanvas");
	
					var barGraph = new Chart(ctx, {
						type: 'bar',
						data: chartdata
					});
					
				}
			};
			xmlhttp.open("POST", "./fetchdata.php",true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("x=" + dbParam);
	}
	
	</script>
	<div class="chart-container">
		<canvas id="mycanvas">
			
		</canvas>
	</div>
	<div id="abcdef">
		
	</div>
	<div id="heid">
	</div>
</body>
</html>