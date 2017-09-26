$(document).ready(function(){
	$.ajax({
		url : "./fetchdata.php",
		type : "POST",
		
		success : function(data){
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
		
		},
		error : function(data){
			
		}
	});
});