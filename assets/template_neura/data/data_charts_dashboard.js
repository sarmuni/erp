// comboBarLineChart
var ctx_combo_bar = document.getElementById("comboBarLineChart").getContext('2d');
var comboBarLineChart = new Chart(ctx_combo_bar, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
					type: 'bar',
					label: 'Row Material Usage',
					backgroundColor: '#ffc107',
					data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
					borderColor: 'white',
					borderWidth: 0
				}, {
					type: 'bar',
					label: 'Row Material Received',
					backgroundColor: '#059BFF',
					data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
				}], 
				borderWidth: 1
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
});	


// comboBarLineChart
var ctx_combo_bar2 = document.getElementById("comboBarLineChart2").getContext('2d');
var comboBarLineChart2 = new Chart(ctx_combo_bar2, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
					type: 'bar',
					label: 'Received',
					backgroundColor: '#fb7e6d',
					data: [4, 1, 7, 5, 2, 13, 10, 16, 7, 8, 12, 5],
					borderColor: 'white',
					borderWidth: 0
				}, {
					type: 'bar',
					label: 'In Use',
					backgroundColor: '#ffc107',
					data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
				}], 
				borderWidth: 1
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
});	



// production category
var ctx_pie_chart = document.getElementById("pieChart").getContext('2d');
var pieChart = new Chart(ctx_pie_chart, {
	type: 'pie',
	data: {
			datasets: [{
				data: [12, 19, 3, 5],
				backgroundColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)'
				],
				label: 'Dataset 1'
			}],
			labels: [
				"SCM",
				"EVAV",
				"STERILE",
				"BEVERAGES"
			]
		},
		options: {
			responsive: true
		}
 
});

var ctx_pie_chart = document.getElementById("pieChart2").getContext('2d');
var pieChart = new Chart(ctx_pie_chart, {
	type: 'pie',
	data: {
			datasets: [{
				data: [1, 4, 19, 5],
				backgroundColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)'
				],
				label: 'Dataset 1'
			}],
			labels: [
				"NEW",
				"OLD",
				"DAMAGED",
				"REPAIR"
			]
		},
		options: {
			responsive: true
		}
 
});



// barChart
var ctx_bar_chart = document.getElementById("barChart").getContext('2d');
var barChart = new Chart(ctx_bar_chart, {
		type: 'bar',
		data: {
			labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"],
			datasets: [
				{
				label: 'Delivery Goods In',
				data: [12, 19, 3, 5, 10, 5, 13, 17, 11, 8, 11, 9],
				backgroundColor: [
					'#ffc107',			
					'#ffc107',			
					'#ffc107',			
					'#ffc107',			
					'#ffc107',			
				],
				borderColor: [
					'rgba(255,99,132,1)'
				],
				borderWidth: 1
			},
			{
				label: 'Delivery Goods Out',
				data: [12, 19, 3, 5, 10, 5, 13, 17, 11, 8, 11, 9],
				backgroundColor: [
					'#007bff',				
				],
				borderColor: [
					'rgba(255,99,132,1)',
				],
				borderWidth: 1
			}
		
		
		]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
});