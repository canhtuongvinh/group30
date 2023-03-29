<?php
function savegraph(){
      $IID = 0;
      $GraphID = 0;
      $GraphType = $_POST['GraphType'];
      $Table = $_POST['Table'];
      $GraphName = $_POST['GraphName'];
      $username = "root";
      $password = "";
      $database = "watermangroup";
      $mysqli = new mysqli("localhost", $username, $password, $database);
      $mysqli->select_db($database) or die( "Unable to select database");

      echo $sql = "INSERT INTO graph (GraphID, GraphName, GraphType, DataLocation, IndividualID) VALUES ($GraphID, '$GraphName', '$GraphType', '$Table', $IID)";
      
      

      if (mysqli_query($mysqli, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    
    mysqli_close($mysqli);
}
?>