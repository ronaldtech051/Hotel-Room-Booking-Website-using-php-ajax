<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Roberto - Hotel &amp; Resort HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <style>
    	table{
    		width: 100%;
    		border-collapse: collapse;
    	}
    	table th{
    		background-color: #1cc3b2;
    		padding-top: 10px;
    		padding-bottom: 10px;
    		text-align: left;
    	}
    	table tr:nth-child(even){background-color: #f2f2f2;}
    	table tr:hover {background-color: #d1f1ed;}
    	table td,table th{
    		border: 1px solid grey;
    		padding: 8px;
    	}
    </style>

</head>

<body>
	<?php
		session_start();
		include "header_admin.php"
	?>
	<h2 style="text-align:center; color: #1cc3b2;">Users</h2>
    <?php
    	$conn=mysqli_connect("localhost","root","","hotel");
		if (!$conn) {
			die("Can't connect".mysqli_connect_error());
		}
		$sql="SELECT * FROM signup WHERE type='1'";
		$result=mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {

			echo "<table>
			<tr>
			<th>User ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Type</th>
			</tr>
			";
			while ($row=mysqli_fetch_assoc($result)) {
				echo "<tr>
						<td>".$row['id']."</td>
						<td>".$row['firstname']."</td>
						<td>".$row['lastname']."</td>
						<td>".$row['email']."</td>
						<td>".$row['gender']."</td>
						<td>".$row['type']."</td>
					  </tr>";
			}
		}
		else{
			echo "<script>alert('No users in database!!')</script>";
		}
    ?>

<script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/roberto.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>