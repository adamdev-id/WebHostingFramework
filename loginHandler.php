<?php
include 'config/connection.php';
		$userID;
		$userName;
		$userBirthdate;
		$userJob;
			$userID = $_POST['loginUsername'];
			$userPassword = $_POST['loginPassword'];
			$userCheck  =  mysqli_query($conn, "SELECT Username FROM Customers WHERE Username = '$userID' AND Password = '$userPassword'");
			$adminCheck =  mysqli_query($conn, "SELECT * FROM Employees WHERE Name = '$userID' AND Password = '$userPassword'");
		
			
			if ($row = mysqli_fetch_assoc($adminCheck))
			{
				header("location: adminHomepage.html");
			}
			else if ($row = mysqli_fetch_assoc($userCheck))
			{
				header("location: userHomepage.html");
			}
			else
			{
				header("location: userLogin.html");
				
			}
			
			
		/*
			if($userCheck || $adminCheck)
			{
				header("location: index_customers.php");
			}
			else
			{
				echo "ERROR, tidak berhasil" . mysqli_error($conn);
			}
			*/
?>