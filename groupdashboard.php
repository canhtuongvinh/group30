<?php require("navbar.php");
include_once("graphsavingsql.php");
include_once("displaygraphscompany.php");
session_start();
if (isset($_POST['submit'])){
	//$DataType = $_POST['DataType'];
	$GraphType = $_POST['GraphType'];
	$Table = $_POST['Table'];
	$GraphName = $_POST['GraphName'];
	//var_dump($DataType);
	//$_SESSION['DataType'] = $DataType;
	$_SESSION['GraphType'] = $GraphType;
	$_SESSION['Table'] = $Table;
	$_SESSION['GraphName'] = $GraphName;
	savegraph();
	header('Location: mydashboard.php');
}

?>
<link rel="stylesheet" href="site.css">
<body style="background-color:#E8E8E8;">
	<div class="container bgcolor">
		<main role="main" class="pb-3">
			<button type="button" class="btn btn-light filterbtn">Filter</button>
			
			<h1>Company Dashboard</h1>
			<div class="row">
				<div class="btn-group">
					<div class="form-group col-md-4">
						<a href = "mydashboard.php" class="btn btn-primary">My Dashboard</a>
					</div>
					
					<div class="form-group col-md-4">
						<a href = "groupdashboard.php" class="btn btn-primary">Group Dashboard</a>
					</div>

						<div class="form-group col-md-4">
							<a href = "reportgeneration2.php" class="btn btn-primary">Report Generation</a>
						</div>

					</dev>
				</div>
		</main>
	</div>





	<?php display_graph_company();
	?>
</body>



<?php require("Footer.php");?>

