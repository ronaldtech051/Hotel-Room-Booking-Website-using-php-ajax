<!DOCTYPE html>
<html>
<body>
	<?php
		session_start();
		$conn=mysqli_connect("localhost","root","","hotel");
		if (!$conn)
		{
			die("Can't connect to db!!".mysqli_connect_error());
		}
		$email=$_POST['email'];
		$fav=$_POST['fpass'];
		$sql="SELECT * FROM signup WHERE email='$email'";
		$result=mysqli_query($conn,$sql);
		$_SESSION['setpass']=0;

		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				$result1=$row['security_a1'];
				$uid=$row['id'];
				if($fav==$result1)
				{
					$_SESSION['setpass']=1;
					$_SESSION['uid']=$uid;
					break;
				}
				else
				{
					$_SESSION['setpass']=0;
				}
			}
			if ($_SESSION['setpass']==1) {
				header("location:newpass_index.php");
			}
			else{
				header("location:fpass.php");
			}
		}
		else
		{
			$_SESSION['setpass']=0;
			header("location:fpass.php");
		}
		
	?>
</body>
</html>