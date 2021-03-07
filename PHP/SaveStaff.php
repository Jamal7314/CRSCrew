<?php 

$UserName = $_POST['username'];
$Password = $_POST['password'];
$FullName = $_POST['realName'];
$Phone = $_POST['phoneNum'];
$Position = $_POST['pos'];
$DateJoined = date("Y/m/d");
$UserType = "Staff";

$SERVERNAME = "localhost";
$dbUsername = "root";
$dbPassword = "";

$conn = new mysqli ($SERVERNAME ,$dbUsername ,$dbPassword);

//checking
if($conn->connect_error){
	die("Some thing error <br>".$connect->connect_error);
}
$conn->select_db("CRS");

$Checkwhitespace = "/\s/";
$CheckFullName = "/\A\s*\z/";
if(preg_match($Checkwhitespace,$UserName) || preg_match($Checkwhitespace,$Password)){
	echo "<script>
	alert('User Name or Password cannot have any white space');
	window.location.href='../RegisterStaff.php';
	</script>";
}
else if(preg_match($CheckFullName,$FullName)){
	echo "<script>
	alert('Full Name cannot be white space');
	window.location.href='../RegisterStaff.php';
	</script>";
}
else{
	$GetUserQuery = "SELECT * from users where UserName='$UserName'";
	$result = $conn->query($GetUserQuery);
	if($result->num_rows != 0){
		echo "<script>
		alert('The user name is duplicate , please select another user name');
		window.location.href='../RegisterStaff.php';
		</script>";
	}
	else{
		$AddUserQuery = "INSERT INTO users values('$UserName','$Password','$FullName','$Phone','$UserType','$Position', '$DateJoined')";
		$conn->query($AddUserQuery);
		echo "<script>
			alert('New Staff Registered Successfully');
			window.location.href='../RegisterStaff.php';
			</script>";
	}
}

$conn->close();
?>