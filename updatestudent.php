<!doctype html>
<html>
<head>
    <title>update</title>
</head>
<body>
	
	<?php 

 require 'db.php';
  $id = $_GET['id'];

  $select_query = "select * from std_info where id = $id";
  $result =  $con->query ($select_query);
  $row = $result->fetch_assoc ();
?>
		<form action='' method='post'>
		<fieldset>
			<legend><h1 style='color:black'><b>Update the following information</b></h1></legend>
			<table>
				<tr>
					<td>Id</td>
					<td><input type='text' name='id' value="<?php echo $row['id']; ?>"></td>
				</tr>
				<tr>
					<td>Full Name</td>
					<td><input type='text' name='name' value="<?php echo $row['name']; ?>" ></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type='text' name='address' value="<?php echo $row['address']; ?>"></td>
				</tr>
				<tr>
					<td>Faculty</td>
					<td><input type='text' name='faculty' value="<?php echo $row['faculty']; ?>"></td>
				</tr>
				<tr>
					<td>Semester</td>
					<td><input type='number' name='semester' value="<?php echo $row['semester']; ?>"></td>
				</tr>
				<tr>
					<td>Join Date</td>
					<td><input type='text' name='date' value='<?php echo $row['date'];?>'></td>
				</tr>
				<tr>
					<td>Fee</td>
					<td><input type='number' name='fee' value="<?php echo $row['fee']; ?>"></td>
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
	$id=$_POST['id'];
	$fullName=$_POST['name'];
	$address=$_POST['address'];
	$faculty=$_POST['faculty'];
	$semester=$_POST['semester'];
	$date=$_POST['date'];
    $fee=$_POST['fee'];
	require 'db.php';

	$update_query="update std_info set id='$id', name='$fullName', address='$address', faculty='$faculty', semester='$semester', date='$date', fee='$fee' where id=$id ";

	if($con->query($update_query))
	{
		echo "<script>alert('data has been updated');</script>";
		 echo "<script>window.location = 'index.php'</script>";
	}
	else
	{
		$message=$con->error."has been occured";
		echo "<script>alert(\"$message\");</script>";
	}
}

?>
</body>
</html>