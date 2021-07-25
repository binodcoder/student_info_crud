<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body bgcolor='#FFC300'>
	<div class='container mt-3'>
	<?php 
require 'header.php';
 require '../dbcon.php';
  $id = $_GET['id'];

  $select_query = "select * from studentinfo where id = $id";
  $result =  $con->query ($select_query);
  $row = $result->fetch_assoc ();
?>
<?php require 'navigation.php';?>


	<div style="font-size:20px;" align="center">
		<form action='' method='post'>
		<fieldset>
			<legend><h1 style='color:black'><b>Update the following information</b></h1></legend>
			<table bgcolor='white' class="table table-striped table-bordered table-condensed">
				<tr>
					<td>Roll Number</td>
					<td><input type='text' name='rollno' value="<?php echo $row['rollno']; ?>" class='form-control'></td>
				</tr>
				<tr>
					<td>Full Name</td>
					<td><input type='text' name='name' value="<?php echo $row['name']; ?>" class='form-control'></td>
				</tr>
				<tr>
					<td>City</td>
					<td><input type='text' name='city' value="<?php echo $row['city']; ?>" class='form-control'></td>
				</tr>
				<tr>
					<td>Parents Contact</td>
					<td><input type='text' name='contact' value="<?php echo $row['parentscontact']; ?>" class='form-control'></td>
				</tr>
				<tr>
					<td>Standard</td>
					<td><input type='number' name='standard' value="<?php echo $row['standard']; ?>" class='form-control'></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type='password' name='password' value='<?php echo $row['password'];?>' class='form-control'></td>
				</tr>
				<tr>
					<td>Image</td>
					<td><input type='text' name='image' value="<?php echo $row['image']; ?>" class='form-control'></td>
				</tr>
				<tr>
					<td><input type='submit' name='updatebtn' value='Update Student' class='btn btn-info'></td>
				</tr>

			</table>
		</fieldset>
	</form>
</div>
<?php 
if(isset($_POST['updatebtn']))
{

	$rollno=$_POST['rollno'];
	$fullName=$_POST['name'];
	$city=$_POST['city'];
	$parentContact=$_POST['contact'];
	$standard=$_POST['standard'];
	$image=$_POST['image'];

	require '../dbcon.php';

	$update_query="update studentinfo set rollno='$rollno', name='$fullName', city='$city', parentscontact='$parentContact', standard='$standard', image='$image' where id=$id ";

	if($con->query($update_query))
	{
		echo "<script>alert('data has been updated');</script>";
		 echo "<script>window.location = 'admindash.php'</script>";
	}
	else
	{
		$message=$con->error."has been occured";
		echo "<script>alert(\"$message\");</script>";
	}
}

?>
<?php 
include('footer.php');
?>
</div>
</body>
</html>