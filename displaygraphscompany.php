<?php
function display_graph_company(){
    include_once("fusioncharts.php");
    $username = "root";
    $password = "";
    $database = "watermangroup";
    $mysqli = new mysqli("localhost", $username, $password, $database);
    $mysqli->select_db($database) or die( "Unable to select database");

    $A = "SELECT * FROM companygraph WHERE IndividualID = '0'";
    $result = $mysqli->query($A);
    $rows = $result->fetch_all(MYSQLI_NUM);

    $graphs = array();
    for($i = 0; $i < count($rows); $i++){
        $GraphName = $rows[$i][1];
        $GraphType = $rows[$i][2];
        $Table = $rows[$i][4];
        $chartData = array();

        if($Table === "complianceauditor"){
            $array = array('No60PlusScoredAspects', 'No12PlusScoreHazardsPerClient', 'NoClimateRisks', 'NoClimateOpportunities');
        } elseif($Table === "legalregister"){
            $array = array('%LegalRegisterRedPerClient', '%LegalRegisterAmberPerClient', '%LegalRegisterGreenPerClient', 'NoLegalRegistersRedPerUser', 'NoLegalRegistersAmberPerClient', 'NoLegalRegistersGreenPerClient');
        } elseif($Table === "improvementtracker"){
            $array = array('NoActionsSetByYearPerClient', 'TotalNoActionsOpenPerClient', '%DueActions', '%OutstandingActions', '%RequiringV&VPerAccount', 'NoActionsClosedOnOrBeforeDueDatePerUser', 'NoActionsClosedAfterDueDatePerUser', 'NoActionsPerUser');
        } else {
            continue; // Skip this row if the table name is not recognized
        }
        $hostdb2 = "localhost";  
        $userdb2 = "root";  
        $passdb2 = ""; 
        $namedb2 = "watermangroup";  
     
        // Establish a connection to the database
        $dbhandle2 = new mysqli($hostdb2, $userdb2, $passdb2, $namedb2);
     
        /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
        if ($dbhandle2->connect_error) {
         exit("There was an error with your connection: ".$dbhandle2->connect_error);
        }
     ?>

    <div class = "center2">
        <?php if ($i % 3 == 0): ?>
            <div class="row">
        <?php endif; ?>
        
        <div class="column">
            <div id="chart-<?php echo $i; ?>"></div>
        </div>
        
        <?php if (($i + 1) % 3 == 0 || $i == count($rows) - 1): ?>
            </div>
        <?php endif; ?>
    </div>
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

           $strQuery = "SELECT * FROM $Table";
     
           // Execute the query, or else return the error message.
           $result = $dbhandle2->query($strQuery) or exit("Error code ({$dbhandle2->errno}): {$dbhandle2->error}");
     
           // If the query returns a valid response, prepare the JSON string
           while($row = mysqli_fetch_assoc($result)) {
            foreach($array as $column){
                $chartData[] = array(
                    "label" => $column, 
                    "value" => $row[$column]
                );
            }
        }




        $graphs[] = array(
            "name" => $GraphName,
            "type" => $GraphType,
            "data" => $chartData
        );
    

    // Close the database connection
    
    
    // Render the charts
    foreach($graphs as $graph) {
        $jsonEncodedData = json_encode(array(
            "chart" => array(
                "caption" => $GraphName,
                "showValues" => "0",
                "theme" => "fusion"
            ),
            "data" => $chartData
        ));

        $columnChart = new FusionCharts($GraphType, "myFirstChart-$i" , 450, 250, "chart-$i", "json", $jsonEncodedData);

        $columnChart->render();

    }
    
    }
}
    
?>
