<?php
$con=mysqli_connect('localhost','root','','std_db');

if($con==false){
echo "<script>alert('connection failed');</script>";
}else{
echo "";
}
?>