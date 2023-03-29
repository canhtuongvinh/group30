<?php require("navbar.php");
include_once("graphsavingsql.php");

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
			
			<h1>My Dashboard</h1>
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

						<div class="form-group col-md-4">
							<button type="button" class="btn btn-light" id="myBtn2" title="Create Graph">+</button>
						</div>
					</dev>
				</div>
		</main>
	</div>


<!-- ---- -->


	<!-- <button id="myBtn2">Click Me</button> -->

	<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="px-5">
				<form action = "" method = "post">
				<p><strong>Graph Creation:</strong></p>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Data Type</label>
					<select class="form-control my-1" id="Table" name="Table" onfocus="size=5" onchange="size=1">
						<option value="" disabled selected hidden>Select data type</option>
						<option value = "complianceauditor">Compliance Auditor</option>
						<option value = "improvementtracker">Improvment Tracker</option>
						<option value = "legalregister">Legal Register</option>
					</select>
				</div>

				<!-- <div class="form-group">
					<label for="exampleFormControlSelect2">Data Type</label>
					<select class="form-control my-1" id="DataType" name="DataType" onfocus="size=5" onchange="size=1">
						<option value="" disabled selected hidden></option>
						<option value = "">No. 60+ Scored Aspects</option>
						<option value = "No12PlusScoredHazardsPerClient">No. 12+ scored Hazards per client</option>
						<option value = "NoClimateRisks">No. Climate Risks</option>
						<option value = "NoClimateOpportunities">No. Climate Opportunities</option>
						<option value = "LegalRegisterRed">Legal Register R/A/G distribution</option>
						<option value = "No.ActionsSetByYearPerClient">No. actions set by year</option>
						<option value = "%DueActions">%DueActions</option>
						<option value = "TotalNoActionsOpenPerClient">Total No. Actions open per client</option>
						<option value = "%OutstandingActions">% Outstanding actions</option>
						<option value = "%RequriringV&VPerAccount">% Requriring V&V per account</option>
						<option value = "NoActionsClosedOnOrBeforeDueDate">No. Actions Closed on or before due date</option>
						<option value = "NoActionsClosedAfterDueDate">No. Actions Closed after due date</option>
						<option value = "NoActionsPerUser">No. Actions per user</option>
					</select>
				</div> -->

				<div class="form-group">
					<label for="exampleFormControlSelect3">Graph Type</label>
					<select class="form-control my-1" id="GraphType" name="GraphType" onfocus="size=5" onchange="size=1">
						<option value="" disabled selected hidden>Select the graph type</option>
						<option value="bar2d">Bar Chart</option>
						<option value="doughnut2d">Doughnut Chart</option>
						<option value="pie2d">Pie Chart</option>
					</select>
				</div>
				<div class="form-group my-1">
					<label for="exampleFormControlInput4">Graph Name</label>
					<input type="text" class="form-control" id="GraphName" name = "GraphName" placeholder="">
				</div>
				<input class="btn btn-primary" type="submit" value="submit" name ="submit">
                <a class="btn btn-primary my-3 submitbtn" id="submitBtn">submit</a>
				</form>
            </div>
        </div>
	</div>


	<script>
		// Get the modal
		var modal = document.getElementById("myModal");
		// Get the button that opens the modal
		var btn = document.getElementById("myBtn2");
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];
		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		modal.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		modal.style.display = "none";
		}
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
		}

//this script below limits the choices in mydashboard so the data will be feed to the appropriate graphs
		const tableSelect = document.getElementById('Table');
const graphTypeSelect = document.getElementById('GraphType');

tableSelect.addEventListener('change', () => {
  const selectedTable = tableSelect.value;

  graphTypeSelect.innerHTML = '';

  const defaultOption = document.createElement('option');
  defaultOption.value = '';
  defaultOption.text = 'Select the graph type';
  graphTypeSelect.add(defaultOption);

  if (selectedTable === 'complianceauditor') {
    const bar2dOption = document.createElement('option');
    bar2dOption.value = 'bar2d';
    bar2dOption.text = 'Bar Chart';
    graphTypeSelect.add(bar2dOption);

    graphTypeSelect.disabled = false;
  } else if (selectedTable === 'improvementtracker') {
    const bar2dOption = document.createElement('option');
    bar2dOption.value = 'bar2d';
    bar2dOption.text = 'Bar Chart';
    graphTypeSelect.add(bar2dOption);

    const doughnut2dOption = document.createElement('option');
    doughnut2dOption.value = 'doughnut2d';
    doughnut2dOption.text = 'Doughnut Chart';
    graphTypeSelect.add(doughnut2dOption);

    const pie2dOption = document.createElement('option');
    pie2dOption.value = 'pie2d';
    pie2dOption.text = 'Pie Chart';
    graphTypeSelect.add(pie2dOption);

    graphTypeSelect.disabled = false;
  } else if (selectedTable === 'legalregister') {
    const bar2dOption = document.createElement('option');
    bar2dOption.value = 'bar2d';
    bar2dOption.text = 'Bar Chart';
    graphTypeSelect.add(bar2dOption);

    const pie2dOption = document.createElement('option');
    pie2dOption.value = 'pie2d';
    pie2dOption.text = 'Pie Chart';
    graphTypeSelect.add(pie2dOption);

    const doughnut2dOption = document.createElement('option');
    doughnut2dOption.value = 'doughnut2d';
    doughnut2dOption.text = 'Doughnut Chart';
    graphTypeSelect.add(doughnut2dOption);

    graphTypeSelect.disabled = false;
  } else {
    graphTypeSelect.disabled = true;
  }
});

graphTypeSelect.addEventListener('change', () => {
  const selectedGraphType = graphTypeSelect.value;
  const selectedTable = tableSelect.value;

  if (selectedTable === 'complianceauditor' && selectedGraphType !== 'bar2d') {
    graphTypeSelect.value = 'bar2d';
  }
});



	</script>

	<?php
	include_once("displaygraphs.php");
	display_graph();
	?>
</body>



<?php require("Footer.php");?>

