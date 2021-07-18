<?php
	/*
    $conn = mysqli_connect("localhost", "root", "", "quiz");
	
	$kota_Asal = $_GET['kotaAsal'];
	$kota_Tujuan = $_GET['kotaTujuan'];
	
    $sql = "SELECT id_track, ongkos FROM track WHERE kota_asal = '$kota_Asal' AND kota_tujuan = '$kota_Tujuan'";
    $queryResult = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($queryResult))
	{
		echo $row['ongkos'];
		//echo '<input type="text" id="time" value="' . $row['ongkos'] . '" class="form-control">';
    }
	*/
    echo ("<center> <h1>");
    echo date("F d, Y h:i:s A");
    echo ("</center> </h1>");
?>