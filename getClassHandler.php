<?php
    $conn = mysqli_connect("localhost", "root", "", "adamhosting");
	
	$users_arr = array();
	
	$serverClass = $_POST['serverClass'];
	
	$sql = "SELECT ID FROM Serverlist WHERE Category = '$serverClass'";
	$queryResult = mysqli_query($conn, $sql);
	
	//echo "<select id='serverType' class='form-select' required>";
	while ($row = mysqli_fetch_array($queryResult))
	{
		$serverID = $row['ID'];
		
		//echo $serverID;
		$users_arr[] = array("id" => $serverID);
	
?>
	<!--<option value="<?php //echo $ID ?>"><?php //echo $ID ?></option>-->
<?php

}

//echo json_encode($users_arr);
//echo "</select>";
?>
