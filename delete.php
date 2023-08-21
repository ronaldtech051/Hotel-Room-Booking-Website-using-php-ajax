<!DOCTYPE html>
<html>
<body>
	<?php
	$uid=$_GET['uid'];
	$conn=mysqli_connect("localhost","root","","hotel");
	if(!$conn)
	{
		die("Can't connect".mysqli_connect_error());
	}
	$sql="DELETE FROM signup WHERE id=$uid";
	if (mysqli_query($conn,$sql)) {
		header("location:delete_user.php");
	}
	else
	{
		echo "<script>alert('Can't delete row!')</script>";
	}
	mysqli_close($conn);
	?>
</body>
</html>