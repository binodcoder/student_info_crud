<!doctype html>
<html>
<head>
	<title>demo paper</title>
</head>
<body>
    
    Insert Student Info<br><br>
	
			<form action="" method="post">
				<input type='number' min="1" max="100" name='id' required autofocus placeholder='Roll Number'><br>
				<input type='text' name='name' minlength="5" pattern="^\D*$" required placeholder='Full Name'><br>
				<input type='text' name='address' required minlength="3" placeholder="City"><br>
                <input type='text' name='faculty' required minlength="3" placeholder="City"><br>
                <input type='number' min="1" name='semester' required placeholder="Semester"><br>
                <input type='text' name='join_date' required minlength="3" placeholder="City"><br>
                <input type='number' min="1" name='fee' required placeholder="Fee"><br>
                <input type='submit' name='insertbtn' value='Add Students' class='btn btn-info'><br>
			</form>
		</div>
		<?php 
		require 'db.php';
		if(isset($_POST['insertbtn']))
		{
			$id=$_POST['id'];
			$name=$_POST['name'];
			$address=$_POST['address'];
			$faculty=$_POST['faculty'];
			$semester=$_POST['semester'];
			$join_date=$_POST['join_date'];
            $fee=$_POST['fee'];

            $insert_query="insert into std_info(id, name, address, faculty, semester, date, fee)values('$id', '$name','$address','$faculty','$semester','$join_date','$fee')";
	 
			if($con->query($insert_query))
			{
				echo "<script>alert('New data has been added');</script>";
			}
			else
			{
				$message=$con->error."has been occured";
				echo "<script>alert(\"$message\");</script>";
			}
		}
		?>
<br><br>
        View the student Info
<br><br>
        <form action='' method='post'>
			<input type='text' name='id' placeholder='ID'>
			<input type='submit' name='search' value='search'>
		</form>
		
			<table border="2">
				<tr>
					<th>SN</th>
					<th>ID</th>
					<th>Name</th>
					<th>Address</th>
					<th>Faculty</th>
					<th>Semester</th>
					<th>Join Date</th>
                    <th>Fee</th>
					<th>Action</th>
				</tr>
				<?php
				require 'db.php';
				if(isset($_POST['search'])){
				$id=$_POST['id'];
				$select_query="select * from std_info where id='$id' order by id desc";
				$data=$con->query($select_query);
				$count=1;
				while($row=$data->fetch_assoc())
				{
					?>
					<tr>
						<td><?php echo $count++; ?></td>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['faculty']; ?></td>
						<td><?php echo $row['semester']; ?></td>
						<td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['fee']; ?></td>
						<td><a href="deletestudent.php?id=<?php echo $row['id']?>" class="btn">remove</a>
							<a href="updatestudent.php?id=<?php echo $row['id']?>" class="btn">update</a>
						</td>
					</tr>
				<?php }}?>
			</table>
				
            
	
	</body>
	</html>