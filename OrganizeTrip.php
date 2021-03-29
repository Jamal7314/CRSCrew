<!DOCTYPE html>
<html>

<?php
    session_start();
?>

<head>
	<title></title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
	<link rel="stylesheet" href="CSS/style.css">
	<script type="text/javascript" src="JavaScript/script.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
</head>
<body class="bg-white text-black">
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
		<div class="container">

			  <a class="navbar-brand" href="#">CRS</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="navbar-nav mr-auto w-100 justify-content-end">
			      <li class="nav-item"><a class="nav-link" href="StaffPage.html">Home </a></li>
			      <li class="nav-item"><a class="nav-link active" href="OrganizeTrip.php">Organize Trip<span class="sr-only">(current)</span></a></li>
			      <li class="nav-item"><a class="nav-link" href="ManageApplications.php">Manage Applications</a></li>
			      <li class="nav-item"><a class="nav-link" href="MainPage.html">LogOut</a></li>
			    </ul>
			  </div>
	  </div>
	</nav>

    
	

    <div class="container">
    	<div class="row">
			<form class="newPatient mt-3 col-lg-9 col-md-9 col-11"  id="newPatient" action="PHP/AddNewTrip.php" method="POST" >
				<h1 style="color:black">ORGANIZE A NEW TRIP</h1>

				<div class="form-group   ">
					<label for="cType">Crisis Type:</label>
					<select name="cType" id="cType" required class="form-control">
						<option value="" >Select a Crisis Type</option>
						<option value="Flood" >Flood</option>
						<option value="Earthquake" >Earthquake</option>
						<option value="Wildfire" > Wildfire</option>
						
				</select>
					<div class="error" id="usernameError"></div>
				</div>

				<div class="form-group ">
					<label for="location">Location:</label>
				    <input type="text" name="location" id="location" class="form-control" placeholder="Location" required>
				    <div class="error" id="passwordError"></div>
				</div>

				<div class="form-group   ">
					<label for="description">Description:</label>
					<input type="text" name="description" id="description" class="form-control" placeholder="Description" required>
					<div class="error" id="usernameError"></div>
				</div>
				
				<div class="form-group">
					<label for="requirements">Requirements:</label>
				    <input type="text" name="requirements" id="requirements" class="form-control" placeholder="Requirements" required >
				    <div class="error" id="nameError"></div>
				</div>
				
				<div class="form-group">
					<label for="numOfVolunteers">Number of Volunteers:</label>
				    <input type="number" name="numOfVolunteers" id="numOfVolunteers" class="form-control" placeholder="Number of Volunteers" required>
				
		        </div>
		        <div class="error" id="symptomsError"></div>
		        <div class="form-group">
					<label for="tripDate">Trip Date:</label>
				    <input type="text" name="tripDate" id="tripDate" class="form-control" placeholder="Trip Date" required >
				    <div class="error" id="nameError"></div>
				</div>
		        <div class="form-group">
					<label for="minDuration">Minimum Duration:</label>
				    <input type="text" name="minDuration" id="minDuration" class="form-control" placeholder="Minimum Duration" required >
				    <div class="error" id="nameError"></div>
				</div>
		        <div>
				<button type="submit" class="btn btn-outline-primary btn-block mt-3 " id="btnAdd"  >Submit</button>
				
				</div>
			</form>
	</div>

	</div>

	<div class="container mt-5">
		
		<div class="row">
		    <div class="table-responsive">
			<table id="testTable" class="col-12 table table table-hover table-striped table-bordered " >
			  <thead>
			    <tr class="text-white"  style="background-color:#23415c;">
			      <th scope="col">Trip ID</th>
			      <th scope="col">Crisis Type</th>
			      <th scope="col">Description </th>
			      <th scope="col">Requirements</th>
			      <th scope="col">NumOfVolunteers</th>
			      <th scope="col">TripDate</th>
			      <th scope="col">MinDuration</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
							$conn = new mysqli ('localhost', 'root', '',"CRS");
							$GetTestKitQuery = "SELECT * from Trip WHERE UserName ='{$_SESSION["findUser"]}' ";
							$result = $conn->query($GetTestKitQuery);
							$Num = 0;
				            while($row = $result->fetch_assoc()){
				            	$Num++;
							
							echo "<tr>";
							
							echo '<td>'.$row['TripID'].'</td>';
							echo '<td>'.$row['CrisisType'].'</td>';
							
							echo '<td>'.$row['Description'].'</td>';
							echo '<td>'.$row['Requirements'].'</td>';

							echo '<td>'.$row['NumOfVolunteers'].'</td>';
								
							echo '<td>'.$row['TripDate'].'</td>';
							echo '<td>'.$row['MinDuration'].'</td>';

							echo "</tr>";
						}
					
				?>
			  </tbody>
			</table>
		    </div>
		</div>
	</div>
    
   
          <footer class="footerSection bg-dark  mt-5" id="footerdiv">
				<div class="container">
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-md-6 col-12 footer-div">
							<div>
								<h3>About CRSCrew</h3>
								<p>CRSCrew allow volunteers to join wide range of trips to help people whithin a crisis period. </p>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-6 col-12 footer-div text-white">
							<div>
								<h3>Our Address</h3>
								<address>
				                <span>CRSCrew<br></span>123 Bukit Damansara<br>
				                Kuala Lumpur, 50490<br>
				                <span>Phone: <a href="tel:5555555555">(+60) 10-1111212</a></span>
				                </address>
								</div>
							</div>
						</div>
					
				</div>

				<div class="mt-3 text-center">
					<p>Copyright &copy; 2020 All rights reserved. Created in HELP University </p>
					
				</div>
			</footer>
			<script>
				$(document).ready(function(){
				  $("#btnNew").click(function(){
				    $(".oldPatient").hide();
				    $(".newPatient").show();
				  });
				  $("#btnUpdate").click(function(){
				    $(".oldPatient").show();
				    $(".newPatient").hide();
				  });
				});
			</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
