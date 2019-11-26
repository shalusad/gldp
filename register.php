<!DOCTYPE html>
<html lang="en">
<head>
	<title>GLDP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" action="" method="post" name="myform" onsubmit="return validateform()">
					<span class="login100-form-title p-b-33">
						Account Registration
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" id="name" name="name" placeholder="NAME" onblur="return validationname()">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Email is required">
						<input class="input100" type="email" name="email" placeholder="EMAIL">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Phone number is required">
						<input class="input100" type="number" name="phone" placeholder="PHONE" onblur="return validationphone()">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="text" name="password" placeholder="PASSWORD" onblur="return validationpassword()">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<span id="err" style="color: red"></span>


					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Register
						</button>
					</div>


					<div class="text-center">
						<span class="txt1">
							Already an account?
						</span>

						<a href="index.php" class="txt2 hov1">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>  
function validationphone(){  
	var err=document.getElementById('err');
 var phone=document.myform.phone.value;
if(phone.length<10){  
  //alert("Phone must be at least 10 characters long.");
  err.innerHTML="Phone must be at least 10 characters long.";
  return false;  

  }  
  else{
  	err.innerHTML="";
  	return true; 
  }
}  
function validationpassword(){  
   var err=document.getElementById('err');
 var phone=document.myform.password.value;
if(phone.length<6){  
  //alert("Password must be at least 6 characters long."); 
err.innerHTML="Password must be at least 6 characters long.";
  return false;  
  } 
  else{
  	err.innerHTML="";
  	return true; 
  } 
}
function validationname(){  
	var err=document.getElementById('err');
 var name=document.myform.name.value;
  var letters = /^[A-Za-z]+$/;
   if(name.match(letters))
     {
     	err.innerHTML="";
      return true;
     }
   else
     {
     //alert("Not a Valid Name");
     err.innerHTML="not a valid name";
     document.getElementById("name").value="";

     return false;
     }
  }
</script>  

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST'){
	include_once 'config.php';
	$name=$_POST["name"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$pass=$_POST["password"];
	$con=Database();


	$sql="select ifnull(max(loginid),0)+1 id from login";
	$res=$con->query($sql);
	$re=$res->fetch_assoc();
	$id=$re["id"];
	//echo "Phone:".$phone." pass:".$pass;
	$sql="insert into login(loginid,phone,password) values($id,'$phone','$pass')";
	$sql2="insert into register(loginid,name,email) values($id,'$name','$email')";
	
	$res=$con->query($sql);
	$res=$con->query($sql2);
	
	if($res==true){
		echo "<script>alert('registration sucessful');window.location.href='index.php'</script>";
	}
	else{
		echo "<script>alert ('registration failed')</script>";
	}
}



 ?>