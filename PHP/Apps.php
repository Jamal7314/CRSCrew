<?php
session_start();
$ApplicationID = $_POST['appID'];
$Status = $_POST['status'];
$Remarks = $_POST['remarks'];

$TripID = $_SESSION['findTrip'];



$SERVERNAME = "localhost";
$dbUsername = "root";
$dbPassword = "";

$con = new mysqli ($SERVERNAME ,$dbUsername ,$dbPassword,"CRS");

//check connection
if ($con ->connect_error){
    die("connection faild".$con ->connect_error);
}

$GetApplicationQuery = "SELECT * from Application WHERE ApplicationID='$ApplicationID'";
    $result = $con->query($GetApplicationQuery);
    if($result->num_rows <= 0){
        echo "<script>
                alert('Application is not found!');
                window.location.href='../Applications.php';
                </script>";
    }
    else{
        $UpdateApplicationQuery = "UPDATE Application SET Status= '$Status',Remarks ='$Remarks' WHERE ApplicationID= '$ApplicationID'";
        $con->query($UpdateApplicationQuery);
        echo "<script>
                alert('Application Updated!');
                window.location.href='../Applications.php';
                </script>";
    }



 
$con->close();
?>