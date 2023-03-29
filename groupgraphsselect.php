<?php

function select_group_data(){
    include_once("fusioncharts.php");
    $username = "root";
    $password = "";
    $database = "watermangroup";
    $mysqli = new mysqli("localhost", $username, $password, $database);
    $mysqli->select_db($database) or die( "Unable to select database");

    $A = "SELECT CompanyID FROM 'customers - individuals' WHERE IndividualID = '0'";
    $result = $mysqli->query($A);
    $rows = $result->fetch_all(MYSQLI_NUM);
    $B = "SELECT IndividualID FROM 'customers - individuals' WHERE CompanyID = $result";
    $individuals = $mysqli->query($B);
}

?>
