
<?php
	session_start();
	$uid=$_SESSION['uid'];
	echo $uid;
	$conn=mysqli_connect("localhost","root","","hotel");
	if (!$conn) {
			die("Can't connect".mysqli_connect_error());
		}	
	$f1=$_POST['npass'];
	$f2=$_POST['cpass'];
	if ($f1==$f2){
		$_SESSION['passchanged']=1;
		$sql="UPDATE signup SET password='$f1' WHERE id='$uid'";
		mysqli_query($conn,$sql);
		header("location:login.php");
	}
	else
	{
		$_SESSION['passchanged']=0;
		header("location:newpass_index.php");
	}
?>
