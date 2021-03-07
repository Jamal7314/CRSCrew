<?php 

$UserName = $_POST['name'];
$Password = $_POST['password'];
$FullName = $_POST['realName'];
$Phone = $_POST['phoneNum'];
$UserType = $_POST['userType'];

$SERVERNAME = "localhost";
$dbUsername = "root";
$dbPassword = "";

$conn = new mysqli ($SERVERNAME ,$dbUsername ,$dbPassword);

//checking
if($conn->connect_error){
	die("Some thing error <br>".$connect->connect_error);
}

if($conn->select_db("CRS") == false){
	$CreateDatabase = "CREATE DATABASE CRS";
	$conn->query($CreateDatabase);
	$conn->select_db("CRS");
}
else{
	$conn->select_db("CRS");
}

$GetUserQuery = "SELECT * from users";
$result = $conn->query($GetUserQuery);
if($result->num_rows <= 0){
	$CreateUserTableQuery = "CREATE TABLE users(UserName VARCHAR(30) PRIMARY KEY,Password VARCHAR(30) NOT NULL,FullName VARCHAR(50) NOT NULL,Phone VARCHAR(50) NOT NULL,UserType VARCHAR(30) NOT NULL,Position VARCHAR(30),DateJoined date)";
	$conn->query($CreateUserTableQuery);
}

$Checkwhitespace = "/\s/";
$CheckFullName = "/\A\s*\z/";
if(preg_match($Checkwhitespace,$UserName) || preg_match($Checkwhitespace,$Password)){
	echo "<script>
	alert('User Name or Password cannot have any white space');
	window.location.href='../SignUp.html';
	</script>";
}
else if(preg_match($CheckFullName,$FullName)){
	echo "<script>
	alert('Full Name cannot be white space');
	window.location.href='../SignUp.html';
	</script>";
}
else{
	$GetUserQuery = "SELECT * from users where UserName='$UserName'";
	$result = $conn->query($GetUserQuery);
	if($result->num_rows != 0){
		echo "<script>
		alert('The user name is duplicate , please select another user name');
		window.location.href='../SignUp.html';
		</script>";
	}
	else{
		$AddUserQuery = "INSERT INTO users values('$UserName','$Password','$FullName', '$Phone',  $UserType',null,null)";
		$conn->query($AddUserQuery);
		echo "<script>
		alert('SignUp Successfully');
		window.location.href='../Login.html';
		</script>";
	}
}

$conn->close();
?>
