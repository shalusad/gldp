<?php
session_start();
	include_once 'config.php';
	$con=Database();
	$id=$_SESSION["api"];
	$sql = "select * from current_data where api=$id";
	$res = $con->query($sql);
	$row = $res->fetch_assoc();
	echo $row["gas"].",".$row["fire"].",".$row["humidity"].",".$row["temperature"];
?>