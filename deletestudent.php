<?php 
require 'db.php';
$id=$_GET['id'];
$delete_query="delete from std_info where id=$id";

if($con->query($delete_query))
{
	echo "<script>alert('Student has been removed');</script>";
	echo "<script>window.location='index.php';</script>";
}else{
	$message=$con->error."has been occured";
	echo "<script> alert(\"$message\");</script>";
}


?>