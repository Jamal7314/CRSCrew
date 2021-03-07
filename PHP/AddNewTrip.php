<?php
 
$CrisisType = $_POST['cType'];
$Location = $_POST['location'];
$Description = $_POST['description'];
$Requirements = $_POST['requirements'];
$NumOfVolunteers = $_POST['numOfVolunteers'];
$TripDate = $_POST['tripDate'];
$MinDuration = $_POST['minDuration'];


// connection to database
$con = new mysqli ("localhost", "root", "","CRS");

//check connection
if ($con ->connect_error){
    die("connection faild".$con ->connect_error);
}

$GetUserQuery = "SELECT * from Trip";
$result = $con->query($GetUserQuery);
if($result->num_rows <= 0){
    $CreateUserTableQuery = "CREATE TABLE Trip(TripID varchar(20) primary key,
    CrisisType varchar(30) not null,
    Description(200) not null ,
    Requirements varchar(200) not null,
    NumOfVolunteers int(4) not null,
    TripDate varchar(30) not null ,
    MinDuration varchar(30) not null
    foreign key(UserName) references users(UserName))";
    $con->query($CreateUserTableQuery);
}



$AddTripQuery = "INSERT INTO Trip values('$TripID','$CrisisType','$Requirements','$NumOfVolunteers','$TripDate','$MinDuration')";
    $con->query($AddTripQuery);
    echo "<script>
            alert('New Trip Created!');
            window.location.href='../OrganizeTrip.php';
            </script>";

 
$con->close();
?>