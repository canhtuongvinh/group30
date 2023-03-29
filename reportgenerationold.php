<?php require("navbar.php");

?>
<link rel="stylesheet" href="site.css">
<body style="background-color:#E8E8E8;">
	<div class = "container bgcolor">
  	<main role="main" class="pb-3">
			<button class="filterbtn">Filter</button> 
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
							<button type="button" class="btn btn-light" id="myBtn2" title="Create Graph">+</button>
						</div>
				</div>
			</div>

			<div style="padding:12px;">
				<div>
					<div class="col-10">
							<table class="rtable" id="reportTable">
									<thead class="rth">
											<td class="rtd">Report Title</td>
											<td class="rtd">Report Type</td>
											<td class="rtd">Date Generated</td>
											<td class="rtd">View</td>
									</thead>
									<tr class = "rtr">
										<td class="rtd">Actions report</td>
										<td class="rtd">Number of due actions</td>
										<td class="rtd">07/03/2023</td>
										<td class="rtd"><a class="nav-link" href="something.php">Link</a></td>
									</tr>
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
						<option>Data1</option>
						<option>Data2</option>
						<option>Data3</option>
						<option>Data4</option>
						<option>Data5</option>
					</select>
				</div>
				
                <a href="doughnutgraph.php" class="btn btn-primary my-3 submitbtn">Submit</a>
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

