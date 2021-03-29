<?php
session_start();
$TripID = $_POST['tripID'];


$SERVERNAME = "localhost";
$dbUsername = "root";
$dbPassword = "";

$con = new mysqli ($SERVERNAME ,$dbUsername ,$dbPassword,"CRS");

$_SESSION['findTrip']=$TripID;
//check connection
if ($con ->connect_error){
    die("connection faild".$con ->connect_error);
}

$Checkwhitespace = "/\s/";
$CheckTripID = "/\A\s*\z/";

if(preg_match($Checkwhitespace,$TripID)){
    echo "<script>
    alert('Trip ID cannot be empty!');
    window.location.href='../RegisterStaff.php';
    </script>";
}

 else if(preg_match($CheckTripID, $TripID)){
    echo "<script>
    alert('Please enter a valid Trip ID!');
    window.location.href='../ManageApplications.php';
    </script>";
}

    else{
        $ViewApplicationsQuery = "SELECT * from Application where TripID = $TripID";
    $con->query($ViewApplicationsQuery);
    echo "<script>
            
            window.location.href='../Applications.php';
            </script>";

    }

    if (isset($_SESSION['findTrip'])) {
    echo "session is set";
  }


 
$con->close();
?>