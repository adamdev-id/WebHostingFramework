<?php
include 'config/connection.php';
	$getValue = $_GET['act'];
	if ($getValue == 'load' || $getValue == 'tambah' || $getValue == 'update' || $getValue == 'delete')
	{
		$customerID;
		$customerName;
		$customerBirthdate;
		$customerJob;
		if ($_GET['act'] == 'tambah')
		{
			$customerID = $_POST['customerID'];
			$customerName = $_POST['customerName'];
			$customerBirthdate = $_POST['customerBirthdate'];
			$customerJob = $_POST['customerJob'];
			$query =  mysqli_query($conn, "INSERT INTO Customers VALUES('$customerID' , '$customerName' , '$customerBirthdate' , '$customerJob')");
		
			if($query) 
			{
				header("location: index_customers.php");
			}
			else
			{
				echo "ERROR, tidak berhasil" . mysqli_error($conn);
			}
		
		}

		if($_GET['act'] == 'update')
		{	
			$customerUsername = $_POST['update_customerUsername'];
			$customerName = $_POST['update_customerName'];
			$customerPassword = $_POST['update_customerPassword'];
			$customerEmail = $_POST['update_customerEmail'];
			$customerBirthdate = $_POST['update_customerBirthdate'];
		    $query =  mysqli_query($conn, "UPDATE Customers SET Username = '$customerName', Password = '$customerPassword', Email = '$Email', Birthdate = '$customerBirthdate', WHERE Username = '$customerUsername'");

			if($query) 
			{
				header("location: index_customers.php");
			}
			else{
				echo "ERROR, tidak berhasil" . mysqli_error($conn);
			}
		}
		
		if($_GET['act'] == 'delete')
		{
			
			$customerID = $_POST['delete_customerID'];
			$query =  mysqli_query($conn, "DELETE FROM Customers WHERE Username = '$customerUsername'");
			if($query) 
			{
				header("location: index_customers.php");
			}
			else{
				echo "ERROR, tidak berhasil" . mysqli_error($conn);
			}
		}
	}

	$query = mysqli_query($conn, "SELECT *, DATE_FORMAT(customerBirthdate, '%d %M %Y') as customerBirthdate FROM Customers ORDER BY ID ASC");
	echo "<table>
	<tr>
	<th>Nomor</th>
	<th>Employee ID</th>
	<th>Employee Name</th>
	<th>Employee Birthdate</th>
	<th>Employee Job</th>
	</tr>";

	$nomor = 1;

	while ($row = mysqli_fetch_assoc($query)) 
	{
		echo "<td>" . $nomor++ . "</td>";
		echo "<td>" . $row['ID'] . "</td>";
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['Birthdate'] . "</td>";
		echo "<td>" . $row['Job'] . "</td>";
		// echo $row['customerID'] . " ";
		// echo $row['customerName'] . " ";
		// echo $row['customerBirthdate'] . " ";
		// echo $row['customerJob'] . " ";
		echo "<br>";
	}
	echo "</table>";
?>