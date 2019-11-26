<?php 
include_once 'config.php';
if(isset($_POST["temperature"])){
	$temp=$_POST["temperature"];
	$hum=$_POST["humidity"];
	$gas=$_POST["gas"];
	$api=$_POST["api_key"];
	$flame=$_POST["flame"];
	//echo "$temp,$hum,$gas,$api";
	$con=Database();
	$sql="select phone,l.loginid from login l join area a on l.loginid=a.loginid where api='$api'";
	$res=$con->query($sql);
	$res = $res->fetch_assoc();
	$phone=$res["phone"];
	print_r($phone);
	$id=$res["loginid"];
	$sql = "update current_data set gas='$gas',fire='$flame',humidity='$hum',temperature='$temp' where api=$api";
	//echo "$sql";
	$con->query($sql);
	if($gas>2){
		$sql="INSERT INTO `sensored_data`(`gas`, `fire`, `humidity`, `temperature`, `api`) VALUES ('$gas','$flame','$hum','$temp',$api)";
		$con->query($sql);
	}
	$sql="SELECT 1 FROM `sensored_data` where TIMESTAMPDIFF(MINUTE,datetime,CURRENT_TIMESTAMP)>30 and id = (select max(id) from sensored_data)";
	$res=$con->query($sql);
	if ($res->num_rows > 0) {
		$sql="INSERT INTO `sensored_data`(`gas`, `fire`, `humidity`, `temperature`, `api`) VALUES ('$gas','$flame','$hum','$temp',$api)";
		$con->query($sql);
	}
	$sql="DELETE FROM `sensored_data` WHERE id IN (SELECT id FROM `sensored_data` where TIMESTAMPDIFF(DAY,datetime,CURRENT_TIMESTAMP)>3)";
	$con->query($sql);
}
?>