<?php
include 'config/connection.php';
	$getValue = $_GET['act'];
	if ($getValue == 'load' || $getValue == 'tambah' || $getValue == 'update' || $getValue == 'delete')
	{
		$employeeID;
		$employeeName;
		$employeeBirthdate;
		$employeeJob;
		if ($_GET['act'] == 'tambah')
		{
			$employeeID = $_POST['employeeID'];
			$employeeName = $_POST['employeeName'];
			$employeeBirthdate = $_POST['employeeBirthdate'];
			$employeeJob = $_POST['employeeJob'];
			$query =  mysqli_query($conn, "INSERT INTO Employees VALUES('$employeeID' , '$employeeName' , '$employeeBirthdate' , '$employeeJob')");
		
			if($query) 
			{
				header("location: index_employees.php");
			}
			else
			{
				echo "ERROR, tidak berhasil" . mysqli_error($conn);
			}
		
		}

		if($_GET['act'] == 'update')
		{	
			$employeeID = $_POST['update_employeeID'];
			$employeeName = $_POST['update_employeeName'];
			$employeeBirthdate = $_POST['update_employeeBirthdate'];
			$employeeJob = $_POST['update_employeeJob'];
		    $query =  mysqli_query($conn, "UPDATE Employees SET Name = '$employeeName', Birthdate = '$employeeBirthdate', Job = '$employeeJob' WHERE ID = '$employeeID'");

			if($query) 
			{
				header("location: index_employees.php");
			}
			else{
				echo "ERROR, tidak berhasil" . mysqli_error($conn);
			}
		}
		
		if($_GET['act'] == 'delete')
		{
			
			$employeeID = $_POST['delete_employeeID'];
			$query =  mysqli_query($conn, "DELETE FROM Employees WHERE ID = '$employeeID'");
			if($query) 
			{
				header("location: index_employees.php");
			}
			else{
				echo "ERROR, tidak berhasil" . mysqli_error($conn);
			}
		}
	}

	$query = mysqli_query($conn, "SELECT *, DATE_FORMAT(employeeBirthdate, '%d %M %Y') as employeeBirthdate FROM Employees ORDER BY ID ASC");
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
		// echo $row['employeeID'] . " ";
		// echo $row['employeeName'] . " ";
		// echo $row['employeeBirthdate'] . " ";
		// echo $row['employeeJob'] . " ";
		echo "<br>";
	}
	echo "</table>";
?>