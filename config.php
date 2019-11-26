<?php 
function Database()
{
	$Serever="localhost";
	$Username="root";
	$password="";
	$database="iot";
	
	$con=mysqli_connect($Serever,$Username,$password,$database) or die ("sdgdfs");
	return $con;
}

 ?>