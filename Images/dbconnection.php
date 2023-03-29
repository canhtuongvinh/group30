<?php
$username = "root";
$password = "";
$database = "watermangroup";
$mysqli = new mysqli("localhost", $username, $password, $database);
$mysqli->select_db($database) or die( "Unable to select database");

$sql = "SELECT * FROM ";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	  echo $row["IndividualID"]. "<br>";
	}
  } else {
	echo "0 results";
  }
  $mysqli->close();
?>


<?php
$mysqli->close();
?>