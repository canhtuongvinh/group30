<?php require("navbar.php");

?>
<html>
<head>
	<title>My first chart using FusionCharts Suite XT</title>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	<script type="text/javascript">
		FusionCharts.ready(function(){
			var chartObj = new FusionCharts({
    type: 'doughnut2d',
    renderAt: 'chart-container',
    width: '550',
    height: '450',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Legal register R/A/G",
            "subCaption": "Current Values",
            "bgColor": "#ffffff",
            "showLegend": "1",
            "defaultCenterLabel": "Total revenue",
            "centerLabel": "Revenue from $label: $value",
            "centerLabelBold": "1",
            "showTooltip": "0",
            "decimals": "0",
            "theme": "fusion"
        },
        "data": [{
            "label": "Red",
            "value": "28504"
            
        }, {
            "label": "Amber",
            "value": "14633"
        }, {
            "label": "Green",
            "value": "10507"
        }]
    }
}
);
			chartObj.render();
		});
	</script>
	</head>
	<body>
		<div id="chart-container">FusionCharts XT will load here!</div>
	</body>
</html>
	
<?php require("Footer.php");?>