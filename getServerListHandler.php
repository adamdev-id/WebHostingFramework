<?php
    $conn = mysqli_connect("localhost", "root", "", "adamhosting");
	
	$selection = $_GET['selection'];

	switch($selection)
	{
		case "getServers":
		{
			$Username = $_GET['Username'];
			$sql = "SELECT transaction.ID, transaction.Package_ID, serverlist.Name, transaction.Customer_ID FROM transaction INNER JOIN serverlist ON transaction.Package_ID=serverlist.ID WHERE transaction.Customer_ID = '$Username' and transaction.Upgrade_Package = 'None'";
			$queryResult = mysqli_query($conn, $sql);
                echo "<option value='default'>- Select Server from Inventory -</option>";
			while ($row = mysqli_fetch_array($queryResult))
			{
                echo '<br/>';
				//echo "Purchase ID : " . $row['ID'] . " | Server ID : " . $row['Package_ID'] . " | Server Name : " . $row['Name'] . " | User : " . $row['Customer_ID']";
                echo "<option value=" . $row['ID'] . ">Purchase ID : " . $row['ID'] . " | Server ID : " . $row['Package_ID'] . " | Server Name : " . $row['Name'] . " | User : " . $row['Customer_ID'] . "</option>";
			}
		}
				//echo "<option value=" . echo $row['ID'] . ">" . echo $row['ID'] . "</option>";
		break;
	}
	
?>