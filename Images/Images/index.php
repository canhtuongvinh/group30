<?php require("navbar.php");

session_start();
$DataType = $_SESSION['DataType'];
$GraphType = $_SESSION['GraphType'];
$Table = $_SESSION['Table'];
$username = "root";
$password = "";
$database = "watermangroup";
$mysqli = new mysqli("localhost", $username, $password, $database);
$mysqli->select_db($database) or die( "Unable to select database");
var_dump($DataType);
var_dump($Table);
$sql = "SELECT * FROM $Table";


$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	  echo $row[$DataType];
	}
  } else {
	echo "0 results";
  }
  $mysqli->close();
?>
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

