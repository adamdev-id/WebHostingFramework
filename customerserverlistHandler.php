<?php
include 'config/connection.php';
	$getValue = $_GET['act'];
	if ($getValue == 'load' || $getValue == 'tambah' || $getValue == 'update' || $getValue == 'delete')
	{
		$serverID;
		$serverName;
		$serverCategory;
		$serverPrice;
		if ($_GET['act'] == 'tambah')
		{
			$serverID = $_POST['serverID'];
			$serverName = $_POST['serverName'];
			$serverCategory = $_POST['serverCategory'];
			$serverPrice = $_POST['serverPrice'];
			$query =  mysqli_query($conn, "INSERT INTO Serverlist VALUES('$serverID' , '$serverName' , '$serverCategory' , '$serverPrice')");
		
			if($query) 
			{
				header("location: index_serverlist.php");
			}
			else
			{
				echo "ERROR, tidak berhasil" . mysqli_error($conn);
			}
		
		}

		if($_GET['act'] == 'update')
		{	
			$serverID = $_POST['update_serverID'];
			$serverName = $_POST['update_serverName'];
			$serverCategory = $_POST['update_serverCategory'];
			$serverPrice = $_POST['update_serverPrice'];
		    $query =  mysqli_query($conn, "UPDATE Serverlist SET Name = '$serverName', Category = '$serverCategory', Price = '$serverPrice' WHERE ID = '$serverID'");

			if($query) 
			{
				header("location: index_serverlist.php");
			}
			else{
				echo "ERROR, tidak berhasil" . mysqli_error($conn);
			}
		}
		
		if($_GET['act'] == 'delete')
		{
			
			$serverID = $_POST['delete_serverID'];
			$query =  mysqli_query($conn, "DELETE FROM Serverlist WHERE ID = '$serverID'");
			if($query) 
			{
				header("location: index_serverlist.php");
			}
			else{
				echo "ERROR, tidak berhasil" . mysqli_error($conn);
			}
		}
	}

	$query = mysqli_query($conn, "SELECT * FROM Serverlist ORDER BY ID ASC");
	echo "<table>
	<tr>
	<th>Nomor</th>
	<th>Server ID</th>
	<th>Server Name</th>
	<th>Server Category</th>
	<th>Server Price</th>
	</tr>";

	$nomor = 1;

	while ($row = mysqli_fetch_assoc($query)) 
	{
		echo "<td>" . $nomor++ . "</td>";
		echo "<td>" . $row['ID'] . "</td>";
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['Category'] . "</td>";
		echo "<td>" . $row['Price'] . "</td>";
		// echo $row['serverID'] . " ";
		// echo $row['serverName'] . " ";
		// echo $row['serverCategory'] . " ";
		// echo $row['serverPrice'] . " ";
		echo "<br>";
	}
	echo "</table>";
?>