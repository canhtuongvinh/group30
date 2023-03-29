<?php require("navbar.php");

?>
<link rel="stylesheet" href="site.css">
<body style="background-color:#E8E8E8;">
	<div class = "container bgcolor">
  	<main role="main" class="pb-3">
			<button class="btn btn-light filterbtn">Filter</button> 
			<h1>Report generation</h1>
				<div class="row">
					<div class="btn-group">
						<div class="form-group col-md-4">
							<a href = "mydashboard.php" class="btn btn-primary text-nowrap">My Dashboard</a>
						</div>

						<div class="form-group col-md-4">
							<a href = "groupdashboard.php" class="btn btn-primary text-nowrap">Group Dashboard</a>
						</div>

						<div class="form-group col-md-4">
							<a href = "reportgeneration.php" class="btn btn-primary text-nowrap">Report Generation</a>
						</div>
						<div class="form-group col-md-4">
							<button type="button" class="btn btn-light" id="myBtn2" title="Create Report">+</button>
						</div>
				</div>
			</div>

			<div style="padding:12px;">
				<div>
					<div class="col-10">
							<table class="table table-bordered shadow" id="reportTable">
									<thead class="thead-light">
										<tr>
											<th scope="col">Report ID</td>
											<th scope="col">Report Title</td>
											<th scope="col">Date Generated</td>
											<th scope="col">View Report</td>
										</tr>
									</thead>
									<tbody>
										<?php
										$servername = "localhost";
										$username = "root";
										$password = "";
										$database = "watermangroup";

										$connection = new mysqli($servername, $username, $password, $database);

										if ($connection->connect_error){
											die("Connection Failed: " . $connection->connect_error);
										}

										$sql = "SELECT ReportID, ReportTitle, DateGenerated FROM reports";
										$result = $connection->query($sql);

										if (!$result){
											die("Invalid Query: " . $connection->error);
										}

										while($row = $result->fetch_assoc()){
											echo "<tr>
												<th scope='row'>" . $row["ReportID"] . "</th>
												<td>" . $row["ReportTitle"] . "</td>
												<td>" . $row["DateGenerated"] . "</td>
												<td><a href='#' style='text-decoration:none; color:#000000;'>View</a></td>
												</tr>";
										}



										?>
									</tbody>
							</table>
					</div>
				</div>
			</div>
		</main>
	</div>





<!-- Modal -->

	<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="px-5">
				<p><strong>Report Generation</strong></p>
				
				<div class="form-group my-1">
					<label for="reportTitle">Report Title</label>
					<input type="email" class="form-control" id="reportTitle" placeholder="">
				</div>
				<div class="form-group">
					<label for="dataType">Select Data</label>
					<select class="form-control my-1" id="dataType" onfocus="size=5" onchange="size=1">
						<option value="" disabled selected hidden></option>
						<option value = "complianceauditor">Compliance Auditor</option>
						<option value = "legalregister">Legal Register</option>
						<option value = "improvementtracker">Improvement Tracker</option>
						<option>Data4</option>
						<option>Data5</option>
					</select>
				</div>
				
                <a href="reportgeneration2.php" class="btn btn-primary my-3 submitbtn">Submit</a>
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

	</script>




</body>
<?php require("Footer.php");?>

