<?php
	$email=$_GET['d'];
	$conn=mysqli_connect("localhost","root","","hotel");
	if(!$conn){
		die("Can't connect".mysqli_connect_error());
	}
	$sql="SELECT email FROM signup";
	$result=mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($result)) {
		$temp="";
		$err="";
		$len=strlen($email);
		if (strstr($email,substr($row['email'],0,$len))) {
			$err="gotcha";
			if($len==strlen($row['email']))
			{
				$temp="confirm";
			}
			break;
		}
	}
		if ($err=="") {
			echo "error";
		}
		else
		{
			echo "gotcha";
		}
		if ($temp=="confirm") {
			echo "confirm";
		}
?>