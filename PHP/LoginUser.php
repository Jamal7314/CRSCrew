<?php 
	session_start();
	$UserName = $_POST['name'];
	$PassWord = $_POST['password'];

	$conn = new mysqli ('localhost', 'root', '');

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

	$AddUserQuery = "INSERT INTO users values('Manager','123','James', '0109452818',  'Manager',null,null)";
	$conn->query($AddUserQuery);

	$GetUserQuery = "SELECT * from users";
	$result = $conn->query($GetUserQuery);
	if($result->num_rows <= 0){
		echo "<script>
			alert('The User is not exist , please enter again or go to sign up');
			window.location.href='../Login.html';
			</script>";
	}
	else{
		$Checkwhitespace = "/\s/";
		if(preg_match($Checkwhitespace,$UserName) || preg_match($Checkwhitespace,$PassWord)){
			echo "<script>
			alert('User Name or Password cannot have any white space');
			window.location.href='../Login.html';
			</script>";
		}
		else{
			$LoginQuery = "SELECT UserName , Password ,UserType FROM users where UserName='$UserName' AND Password='$PassWord'";
			$result = $conn->query($LoginQuery);
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				if($row["UserType"] == "Manager"){
					header("Location:../ManagerPage.html");
				}
				else if($row["UserType"] == "Staff"){
					header("Location:../StaffPage.html");
				}

			}
			else{
				echo "<script>
				alert('The User is not exist , please enter again or go to sign up');
				window.location.href='../Login.html';
				</script>";
			}
		}
	}

	$conn->close();
?>