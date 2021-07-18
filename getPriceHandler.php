<?php
    $conn = mysqli_connect("localhost", "root", "", "adamhosting");
	
	$selection = $_GET['selection'];

	switch($selection)
	{
		case "getUpgradePrice":
		{
			$upgradeID = $_GET['upgradeID'];
			$sql = "SELECT Price FROM upgrade_parts WHERE ID = '$upgradeID'";
			$queryResult = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($queryResult))
			{
				echo $row['Price'];
			}
		}
		break;
		case "getPrice":
		{
			$serverID = $_GET['serverID'];
			$sql = "SELECT Price FROM Serverlist WHERE Name = '$serverID'";
			$queryResult = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($queryResult))
			{
				echo $row['Price'];
			}
		}
				//echo "<option value=" . echo $row['ID'] . ">" . echo $row['ID'] . "</option>";
		break;
		case "calculateFinal":
		{
			$serverID = $_GET['serverID'];
			$sql = "SELECT Price FROM Serverlist WHERE Name = '$serverID'";
			$queryResult = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($queryResult))
			{
				$total = $row['Price'];
				$rent_duration = $_GET['rentDuration'];
				switch ($rent_duration)
				{
				  case "rentDuration_monthly":
				  {
					$total = ($total * 1);
					$discount = 0;
				  }
				  break;
				  case "rentDuration_quarterly":
				  {
					$total = ($total * 3);
					$discount = $total * 0.1;
				  }
				  break;
				  case "rentDuration_semiannual":
				  {
					$total = ($total * 6);
					$discount = $total * 0.2;
				  }
				  break;
				  case "rentDuration_annually":
				  {
					$total = ($total * 12);
					$discount = $total * 0.3;
				  }
				  break;
				}
				echo $total - $discount;
			}
		}
		break;
	}
	
?>