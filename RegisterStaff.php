<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Record Test Centre Officer</title>
		<link rel="stylesheet" href="CSS/style.css">
	    <script type="text/javascript" src="JavaScript/script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
	<body class="p-3 mb-2 bg-white text-white">
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
			<div class="container">

				  <a class="navbar-brand" href="#">CRS</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="myNavbar">
				     <ul class="navbar-nav mr-auto w-100 justify-content-end">
					<li class="nav-item"><a class="nav-link" href="ManagerPage.html">Home</a></li>
					<li class="nav-item"><a class="nav-link active" href="#">Register Staff Member<span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link" href="MainPage.html">Log Out</a></li>
				</ul>
				  </div>
		  </div>
		</nav>

		<div class="container">
			<form class="row justify-content-md-center" action="PHP/SaveStaff.php" method="Post">
				<div class="col">
					<div class="createTester">
						<h1>Create a new Staff</h1>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="TesterName">Username:</label>
								<input class="form-control" type="text" name="username" id="TesterName" placeholder="Username" >
							</div>
							<div class="form-group col-md-6">
								<label for="TesterPassword">Password:</label>
								<input class="form-control" type="password" name="password" id="TesterPassword" placeholder="Password" >
							    <div class="custom-control">
								   	<input type="checkbox" class="form-check-input" onclick="showTesterPassword()">
									<label class="form-check-label" for="showPassword">Show Password</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="TesterFullName">Full name:</label>
							<input class="form-control" type="text" name="realName" id="TesterFullName" placeholder="full name" >
						</div>
						<div class="form-group">
							<label for="phone">Phone Number:</label>
							<input class="form-control" type="text" name="phoneNum" id="phone" placeholder=" phone" >
						</div>
						<div class="form-group">
							<label for="position">Crisis Type:</label>
					                <input class="form-control" type="text" name="pos" id="position" placeholder=" Position" >
						</div>
						<div class="button">
							<input type="submit" name="submit" value="Submit">
							<input type="reset" name="reset" value="Reset">
						</div>
					</div>
				</div>
			</form>
			<div class="row">
				<div class="col-sm-12">
					<div class="backToManager">
						<input type="button" name="backToManager" value="Back To Manager Page" onclick="document.location='ManagerPage.html'">
					</div>
				</div>
			</div>
			<table class="table table-hover table-dark table-bordered" id="TCList">
				<thead class="thead-dark" style="background-color:#23415c;">
					<tr>
						<th scope="col">#</th>
						<th scope="col" >User Name</th>
						<th scope="col" >Name</th>
						<th scope="col" >Position</th>
						<th scope="col" >Date Joined</th>
					</tr>
				</thead>
				<tbody> 
					<?php
						$conn = new mysqli ('localhost', 'root', '',"CRS");
						$GetAllUserQuery = "SELECT UserName,FullName, Position,DateJoined from users Where UserType= 'Staff'";
						$result = $conn->query($GetAllUserQuery);
						$Num = 0;
						if($result->num_rows > 0){
							while($row = $result->fetch_assoc()){
								$Num++;
								echo "<tr>";
								echo "<td>$Num</td>";
								echo '<td>'.$row['UserName'].'</td>';
								echo '<td>'.$row['FullName'].'</td>';
								echo '<td>'.$row['Position'].'</td>';
								echo '<td>'.$row['DateJoined'].'</td>';
								echo "</tr>";
							}
						}
					?>
				</tbody>
			</table>
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
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>
