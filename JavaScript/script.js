


 function showTable1(){

 	var x = document.getElementById("table1");
 	var y = document.getElementById("table2");
 		x.style.display = "block";
 		y.style.display = "none";
 }

function showPassword(){
	var password = document.getElementById('password');
	if(password.type === "password"){
		password.type = "text";
	}
	else{
		password.type = "password";
	}
}

function showTesterPassword(){
	var TesterPassword = document.getElementById('TesterPassword');
	if(TesterPassword.type === "password"){
		TesterPassword.type = "text";
	}
	else{
		TesterPassword.type = "password";
	}
}

function showRegister(){
	document.getElementById('RegisterTK').style.display ='block';
	document.getElementById('ManageTK').style.display ='none';
}

function showManage(){
	document.getElementById('RegisterTK').style.display ='none';
	document.getElementById('ManageTK').style.display ='block';
}