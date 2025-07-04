function getChartColorsArray(r) {
	if (null !== document.getElementById(r)) {
		var o =
				"data-colors" +
				("-" + document.documentElement.getAttribute("data-theme") ?? ""),
			o =
				document.getElementById(r).getAttribute(o) ??
				document.getElementById(r).getAttribute("data-colors");
		if (o)
			return (o = JSON.parse(o)).map(function (r) {
				var o = r.replace(" ", "");
				return -1 === o.indexOf(",")
					? getComputedStyle(document.documentElement).getPropertyValue(o) || o
					: 2 == (r = r.split(",")).length
					? "rgba(" +
					  getComputedStyle(document.documentElement).getPropertyValue(r[0]) +
					  "," +
					  r[1] +
					  ")"
					: o;
			});
		console.warn("data-colors attributes not found on", r);
	}
}
(Chart.defaults.borderColor = "rgba(133, 141, 152, 0.1)"),
	(Chart.defaults.color = "#858d98");
var barChart,
	pieChart,
	lineChart,
	islinechart = document.getElementById("lineChart"),
	isbarchart =
		((lineChartColor = getChartColorsArray("lineChart")) &&
			(islinechart.setAttribute("width", islinechart.parentElement.offsetWidth),
			(lineChart = new Chart(islinechart, {
				type: "line",
				data: {
					labels: [
						"January",
						"February",
						"March",
						"April",
						"May",
						"June",
						"July",
						"August",
						"September",
						"October",
					],
					datasets: [
						{
							label: "Sales Analytics",
							fill: !0,
							lineTension: 0.5,
							backgroundColor: lineChartColor[0],
							borderColor: lineChartColor[1],
							borderCapStyle: "butt",
							borderDash: [],
							borderDashOffset: 0,
							borderJoinStyle: "miter",
							pointBorderColor: lineChartColor[1],
							pointBackgroundColor: "#fff",
							pointBorderWidth: 1,
							pointHoverRadius: 5,
							pointHoverBackgroundColor: lineChartColor[1],
							pointHoverBorderColor: "#fff",
							pointHoverBorderWidth: 2,
							pointRadius: 1,
							pointHitRadius: 10,
							data: [65, 59, 80, 81, 56, 55, 40, 55, 30, 80],
						},
						{
							label: "Monthly Earnings",
							fill: !0,
							lineTension: 0.5,
							backgroundColor: lineChartColor[2],
							borderColor: lineChartColor[3],
							borderCapStyle: "butt",
							borderDash: [],
							borderDashOffset: 0,
							borderJoinStyle: "miter",
							pointBorderColor: lineChartColor[3],
							pointBackgroundColor: "#fff",
							pointBorderWidth: 1,
							pointHoverRadius: 5,
							pointHoverBackgroundColor: lineChartColor[3],
							pointHoverBorderColor: "#eef0f2",
							pointHoverBorderWidth: 2,
							pointRadius: 1,
							pointHitRadius: 10,
							data: [80, 23, 56, 65, 23, 35, 85, 25, 92, 36],
						},
					],
				},
				options: {
					x: { ticks: { font: { family: "Poppins" } } },
					y: { ticks: { font: { family: "Poppins" } } },
					plugins: { legend: { labels: { font: { family: "Poppins" } } } },
				},
			}))),
		document.getElementById("bar")),
	ispiechart =
		((barChartColor = getChartColorsArray("bar")) &&
			(isbarchart.setAttribute("width", isbarchart.parentElement.offsetWidth),
			(barChart = new Chart(isbarchart, {
				type: "bar",
				data: {
					labels: [
						"January",
						"February",
						"March",
						"April",
						"May",
						"June",
						"July",
					],
					datasets: [
						{
							label: "Sales Analytics",
							backgroundColor: barChartColor[0],
							borderColor: barChartColor[0],
							borderWidth: 1,
							hoverBackgroundColor: barChartColor[1],
							hoverBorderColor: barChartColor[1],
							data: [65, 59, 81, 45, 56, 80, 50, 20],
						},
					],
				},
				options: {
					x: { ticks: { font: { family: "Poppins" } } },
					y: { ticks: { font: { family: "Poppins" } } },
					plugins: { legend: { labels: { font: { family: "Poppins" } } } },
				},
			}))),
		document.getElementById("pieChart")),
	isdoughnutchart =
		((pieChartColors = getChartColorsArray("pieChart")) &&
			(pieChart = new Chart(ispiechart, {
				type: "pie",
				data: {
					labels: ["Desktops", "Tablets"],
					datasets: [
						{
							data: [300, 180],
							backgroundColor: pieChartColors,
							hoverBackgroundColor: pieChartColors,
							hoverBorderColor: "#fff",
						},
					],
				},
				options: {
					plugins: { legend: { labels: { font: { family: "Poppins" } } } },
				},
			})),
		document.getElementById("doughnut")),
	ispolarAreachart =
		((doughnutChartColors = getChartColorsArray("doughnut")) &&
			(lineChart = new Chart(isdoughnutchart, {
				type: "doughnut",
				data: {
					labels: ["데이터 용량"],
					datasets: [
						{
							data: [300, 520],
							backgroundColor: doughnutChartColors,
							hoverBackgroundColor: doughnutChartColors,
							hoverBorderColor: "#fff",
						},
					],
				},
				options: {
					plugins: { legend: { labels: { font: { family: "Poppins" } } } },
				},
			})),
		document.getElementById("polarArea")),
	isradarchart =
		((polarAreaChartColors = getChartColorsArray("polarArea")) &&
			(lineChart = new Chart(ispolarAreachart, {
				type: "polarArea",
				data: {
					labels: ["Series 1", "Series 2", "Series 3", "Series 4"],
					datasets: [
						{
							data: [11, 16, 7, 18],
							backgroundColor: polarAreaChartColors,
							label: "My dataset",
							hoverBorderColor: "#fff",
						},
					],
				},
				options: {
					plugins: { legend: { labels: { font: { family: "Poppins" } } } },
				},
			})),
		document.getElementById("radar"));
(radarChartColors = getChartColorsArray("radar")) &&
	(lineChart = new Chart(isradarchart, {
		type: "radar",
		data: {
			labels: [
				"Eating",
				"Drinking",
				"Sleeping",
				"Designing",
				"Coding",
				"Cycling",
				"Running",
			],
			datasets: [
				{
					label: "Desktops",
					backgroundColor: radarChartColors[0],
					borderColor: radarChartColors[1],
					pointBackgroundColor: radarChartColors[1],
					pointBorderColor: "#fff",
					pointHoverBackgroundColor: "#fff",
					pointHoverBorderColor: radarChartColors[1],
					data: [65, 59, 90, 81, 56, 55, 40],
				},
				{
					label: "Tablets",
					backgroundColor: radarChartColors[2],
					borderColor: radarChartColors[3],
					pointBackgroundColor: radarChartColors[3],
					pointBorderColor: "#fff",
					pointHoverBackgroundColor: "#fff",
					pointHoverBorderColor: radarChartColors[3],
					data: [28, 48, 40, 19, 96, 27, 100],
				},
			],
		},
		options: {
			plugins: { legend: { labels: { font: { family: "Poppins" } } } },
		},
	}));
