gvChartInit();

var maxBox2Height = 0;

$(document).ready(function()
{
	
	$(".chart1 table.myChart").each(function()
	{
		$(this).gvChart(
		{
			chartType: "ColumnChart",
			gvSettings:
			{
				width: 885,
				height: 300,
				backgroundColor:"#F9F9F9"
			}
		});
	});	
	
	
	$(".chart2 table.myChart").each(function()
	{
		$(this).gvChart(
		{
			chartType: "PieChart",
			gvSettings:
			{
				/*colors: ['#c7cfc7', '#b2c8b2', '#d9e0de','#cccccc',],*/
				width: '100%',
				height: 300,
				backgroundColor:"#F9F9F9"
			}
		});
	});
	
	$(".chart3 table.myChart").each(function()
	{
		$(this).gvChart(
		{
			chartType: "LineChart",
			gvSettings:
			{
				width: '100%',
				height: 300,
				backgroundColor:"#F9F9F9"
			}
		});
	});	
	
	$(".chart4 table.myChart").each(function()
	{
		$(this).gvChart(
		{
			chartType: "BarChart",
			gvSettings:
			{
				width: 885,
				height: 300,
				backgroundColor:"#F9F9F9"
			}
		});
	});	
	
	$(".chart5 table.myChart").each(function()
	{
		$(this).gvChart(
		{
			chartType: "AreaChart",
			gvSettings:
			{
				width: 885,
				height: 300,
				backgroundColor:"#F9F9F9"
			}
		});
	});	
	
	
});