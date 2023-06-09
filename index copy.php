<?php require("navbar.php");

session_start();
//$DataType = $_SESSION['DataType'];
$GraphType = $_SESSION['GraphType'];
$Table = $_SESSION['Table'];
$GraphName = $_SESSION['GraphName'];

/* Include the `fusioncharts.php` file that contains functions  to embed the charts. */

   include("fusioncharts.php");

/* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection. */
	 if($Table = "complianceauditor"){
		$array = array('No60PlusScoredAspects', 'No12PlusScoreHazardsPerClient', 'NoClimateRisks', 'NoClimateOpportunities');
	 }
	 if($Table = "legalregister"){
		$array = array('%LegalRegisterRedPerClient', '%LegalRegisterAmberPerClient', '%LegalRegisterGreenPerClient', 'NoLegalRegistersRedPerUser', 'NoLegalRegistersAmberPerClient', 'NoLegalRegistersGreenPerClient');
	 }
	 if($Table = "improvementtracker"){
		$array = array('NoActionsSetByYearPerClient', 'TotalNoActionsOpenPerClient', '%DueActions', '%OutstandingActions', '%RequiringV&VPerAccount', 'NoActionsClosedOnOrBeforeDueDatePerUser', 'NoActionsClosedAfterDueDatePerUser', 'NoActionsPerUser');
	 }
	 
   $hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "";  // MySQL password
   $namedb = "watermangroup";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if ($dbhandle->connect_error) {
    exit("There was an error with your connection: ".$dbhandle->connect_error);
   }
?>

<html>
  <head>
    <title>FusionCharts XT - Column 2D Chart - Data from a database</title>
    <link  rel="stylesheet" type="text/css" href="css/style.css" />
    <!-- You need to include the following JS file to render the chart.
    When you make your own charts, make sure that the path to this JS file is correct.
    Else, you will get JavaScript errors. -->
    <script src=" https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script src=" https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
  </head>
   <body>
    <?php
      // Form the SQL query that returns the top 10 most populous countries
      $strQuery = "SELECT * FROM $Table";

      // Execute the query, or else return the error message.
      $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

      // If the query returns a valid response, prepare the JSON string
      if ($result) {
          // The `$arrData` array holds the chart attributes and data
          $arrData = array(
              "chart" => array(
                  "caption" => $GraphName,
                  "showValues" => "0",
                  "theme" => "fusion"
                )
            );

          $arrData["data"] = array();

  // Push the data into the array
          while($row = mysqli_fetch_array($result)) {
			foreach($array as $column){
            array_push($arrData["data"], array(
                "label" => $column, 
                "value" => $row[$column]
                )
            );
			}}


          /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

          $jsonEncodedData = json_encode($arrData);

  /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

          $columnChart = new FusionCharts($GraphType, "myFirstChart" , 700, 400, "chart-1", "json", $jsonEncodedData);

          // Render the chart
          $columnChart->render();

          // Close the database connection
          $dbhandle->close();
      }
    ?>
    <div id="chart-1"><!-- Fusion Charts will render here--></div>\
   </body>
</html>
<body class="bgcolor2">
	<div>
		<main>
			<h1>My Dashboard</h1>

			<div class="row">
				<div class="col-sm">
					<a href="mydashboard.php" class="btn btn-primary">My Dashboard</a>
				</div>
				<div class="col-sm">
					<a href="groupdashboard.php" class="btn btn-primary">Group Dashboard</a>
				</div>
				<div class="col-sm">
					<a href="reportgeneration.php" class="btn btn-primary">Report Generation</a>
				</div>

			</div>

		</main>
	</div>

	


<?php require("Footer.php");?>

