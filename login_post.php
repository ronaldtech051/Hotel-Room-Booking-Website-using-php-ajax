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
		$pass=$_POST['password'];

		$sql="SELECT * FROM signup WHERE email='$email' AND password='$pass'";

		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$_SESSION['pass_set']=0;
			while($row=mysqli_fetch_assoc($result))
			{

				
				$_SESSION['uname']=$row['firstname'];
				if($row['type']==0)
				{
					$_SESSION['uid']=$row['id'];
					$_SESSION['profile']=$row['id'];
					$_SESSION['type']=0;
					$_SESSION['norooms']=0;
					header("location:index_admin.php");
				}
				else
				{
					$_SESSION['uid']=$row['id'];
					$_SESSION['profile']=$row['id'];
					$_SESSION['type']=1;
					$_SESSION['norooms']=0;
					header("location:index.php");
				}
			}
		}
		else
		{
			$_SESSION['pass_set']=1;
			header("location:login.php");
		}
		mysqli_close($conn);
	?>
</body>
</html>