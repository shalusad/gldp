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
<body><?php
 include_once 'config.php';
              $id=$_GET['id1'];
               $con=Database();
     $sql="select * from register where phone=$id";
    $sql2="select * from login where phone=$id";
    $res=$con->query($sql);
    $res2=$con->query($sql2);
        $f=mysqli_fetch_array($res);
        $f1=mysqli_fetch_array($res2);
                ?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method="post" name="myform" onsubmit="return validateform()">
					<span class="login100-form-title p-b-33">
						My Profile
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="name" placeholder="NAME" onblur="return validationname()"value="<?php echo $f['name'];?>">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Email is required">
						<input class="input100" type="email" name="email" placeholder="EMAIL" value="<?php echo $f['email'];?>">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Phone number is required">
						<input class="input100" type="number" name="phone" placeholder="PHONE" onblur="return validationphone()" value="<?php echo $f['phone'];?>">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="text" name="password" placeholder="PASSWORD" onblur="return validationpassword()" value="<?php echo $f1['password'];?>">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>




					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							UPDATE
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

 var phone=document.myform.phone.value;
if(phone.length<10){  
  alert("Phone must be at least 10 characters long.");  
  return false;  

  }  
}  
function validationpassword(){  

 var phone=document.myform.password.value;
if(phone.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  
  }  
}
function validationname(){  
 var name=document.myform.name.value;
  var letters = /^[A-Za-z]+$/;
   if(name.match(letters))
     {
      return true;
     }
   else
     {
     alert("Not a Valid Name");
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

	//echo "Phone:".$phone." pass:".$pass;
	$con=Database();
	$sql="insert into register(name,email,phone)values('$name','$email','$phone')";
	$sql2="insert into login(phone,password)values('$phone','$pass')";
	
	$res=$con->query($sql);

	if($res==true){
		$res=$con->query($sql2);
		echo "<script>alert('registration sucessful')</script>";
	}
	else{
		echo "<script>alert ('registration failed')</script>";
	}
}



 ?>
