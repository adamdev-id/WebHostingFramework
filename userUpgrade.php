<?php
	include "config/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="assets/vendor/dashboard/dashboard.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
	<!-- Bootstrap Javascripts -->
	<script src="assets/js/script.js"> </script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>

    <script src="assets/vendor/dashboard/dashboard.js"></script>

    <title>Adam Hosting co. | Purchase</title>
</head>
<body style="overflow-y:hidden; overflow-x: hidden;">
<div class="container">
    <div class="mainbg">
	
	<br>

    	<div class="jumbotron">
	        <center>
            	<b>
	                <h4>Adam Hosting Services</h4>
                	<h5></h5>
                	<p>International Hosting Company</p>
            	</b>
        	</center>
    	</div>

		<div class="col-md-6 offset-md-3">
			<form action="userCheckout.php?selection=userUpgrade" class="form" method="POST">
			<!--<form action="printResult.php" class="centered-wrapper form" method="post">-->
			<div class="row">
			
				<hr>
				
				<div class="col-12">
					<h4>Userlist</h4>
					<select name="Userlist" id="Userlist" class="form-select" required>
						<option value="">- Pilih Paket Upgrade -</option>

						<?php
                        $sql = "SELECT * FROM customers";
                        $query = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($query)) 
						{
                    ?>
                    <option value="<?php echo $row['Username']; ?>"><?php echo 'User: ' . $row['Username']; ?></option>
                    <?php
                    }
                    ?>

					</select>
					
					<br>
				</div>

				<br>

				<div class="col-12">
					<h4>Transaction Name</h4>
					<select name="transactionID" id="transactionID" class="form-select" required>
						<option value="">- Pilih Paket Upgrade -</option>

						<?php
                        $sql = "SELECT transaction.Package_ID, serverlist.Name, transaction.Customer_ID FROM transaction INNER JOIN serverlist ON transaction.Package_ID=serverlist.ID WHERE transaction.Customer_ID = ''";
                        $query = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($query)) 
						{
                    ?>

                    <option value="<?php echo $row['ID']; ?>"><?php echo 'Transaction ID : ' . $row['ID'] . ' | Server ID : ' . $row['Package_ID'] . " | Server Name : " . $row['Name'] . " | User : " . $row['Customer_ID']; ?></option>
                    <?php
                    }
                    ?>
					</select>
					
					<br>
				</div>

				<br>

				<script>
					function getAlert()
					{
							var serverCategory = $("#serverClass").val();
						
							alert(serverCategory);
					}
				</script>

				<br>

				<div class="col-12">
					<h4>Upgrade Package</h4>
					<select name="upgradePackageID" id="upgradePackageID" class="form-select" required>
						<option value="">- Pilih Paket Upgrade -</option>

						<?php
                        $sql = "SELECT * FROM upgrade_parts ORDER BY Price asc";
                        $query = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($query)) 
						{
                    ?>
                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['ID'] . " | RAM : " . $row['RAM'] . " | Storage : ". $row['Storage'] . " | CPU : " . $row['CPU'] . " | Price : " . $row['Price']; ?></option>
                    <?php
                    }
                    ?>

					</select>
					
					<br>
				</div>
				
				<div class="col-12">
				<h4>Harga: </h4>
				<input name="total" id="total" value="Rp. 0" readonly></input> 
				</div>

				<div class="col-12">
				<h4>Payment Type:</h4>
				<select id="paymentType" name="paymentType" class="form-select" required>
					<option value="">- Pilih Jenis Pembayaran -</option>
					<option value="Card">Debit / Credit</option>
					<option value="PayPal">PayPal</option>
				</select>
				</div>

				<br>

				<!--<button type="submit" onclick="FungsiNilai()" class="but btn btn-success">Purchase</button>-->

				<br>

				<div class="col-12">
				<input class="but btn btn-success" type="submit" name="submit" value="PURCHASE" style="color: green">
				</div>
				<!-- <button type="button" onclick="save()" class="btn btn-primary">Simpan <i class="bi bi-save"></i></button> -->
				<hr>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$('#serverClass').change(function()
	{
		var serverClass = $('#serverClass option:selected').text();
		$.get('getClassHandler.php?serverClass=' + serverClass + '', function(data)
		{
			$('#serverType').attr(data);
		});
	});
	
	$('#Userlist').change(function()
	{
		$('#transactionID').html("");
		var Username = $('#Userlist option:selected').val();
		$.get('getServerListHandler.php?selection=getServers&Username=' + Username + '', function(data)
		{
			var outecho = data.split('<br/>');
        	jQuery.each(outecho, function() 
			{
				//alert(this);
				$('#transactionID').append(this);
        	});
		});
	});

	$('#upgradePackageID').change(function()
	{
		var upgradeID = $('#upgradePackageID option:selected').val();
		$.get('getPriceHandler.php?selection=getUpgradePrice&upgradeID=' + upgradeID + '', function(data)
		{
			//'Rp. ' + 
			$('#total').val(data);
		});
	});

	$('#rentDuration').change(function()
	{
		var serverType = $('#serverType option:selected').text();
		var rentDuration = $('#rentDuration option:selected').val();
		//alert('getPriceHandler.php?selection=calculateFinal&getPrice=' + getPrice + '&rentDuration=' + rentDuration);
		$.get('getPriceHandler.php?selection=calculateFinal&serverID=' + serverType + '&rentDuration=' + rentDuration + '', function(data)
		{
			//'Rp. ' + 
			$('#total').val(data);
		});
	});
	//alert($('#serverType').text());
});
</script>


</body>
</form>
</html>

