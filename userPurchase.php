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
			<form action="userCheckout.php?selection=userPurchase" class="form" method="POST">
			<!--<form action="printResult.php" class="centered-wrapper form" method="post">-->
			<div class="row">
			
				<hr>
				
				<label for="customerName" class="form-label">Nama Pembeli</label>
				<input type="text" id="customerName" name="customerName" class="form-control" placeholder="Nama Pembeli" required>

				<br>
				
				<label for="customerNumber" class="form-label">Telepon</label>
				<input type="text" id="customerNumber" name="customerNumber" class="form-control" placeholder="(Optional)">
				
				<br>
				
				<label for="nationality" class="form-label">Country</label>
				<input type="text" id="nationality" name="nationality" class="form-control" placeholder="Indonesia" required>
				
				<br>

				<script>
					function getAlert()
					{
							var serverCategory = $("#serverClass").val();
						
							alert(serverCategory);
					}
				</script>

				<!--
				<div class="col-6">
					<h4>Server Class</h4>
					<select name="serverClass" id="serverClass" onchange="getAlert()"class="form-select" required>
						<option value="">-Pilih Class-</option>
						<option value="Regular">Regular</option>
						<option value="Premium">Premium</option>
						<option value="dedicated_Regular">Dedicated Regular</option>
						<option value="dedicated_Premium">Dedicated Premium</option>
						<?php
                        /*
						$sql = "SELECT Category FROM Serverlist GROUP BY Category DESC";
                        $query = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($query)) 
						{
							
                    ?>
                    <option value="<?php echo $row['Category']; ?>"><?php echo $row['Category']; ?></option>
                    <?php
                    }
                    */
					?>
						
					</select>
				</div>
				-->
					<br>
				<div class="col-12">
					<h4>Server ID</h4>
					<select name="serverType" id="serverType" class="form-select" required>
						<option value="">-Pilih Merk-</option>

						<?php
                        $sql = "SELECT DISTINCT ID, Name FROM Serverlist";
                        $query = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($query)) 
						{
                    ?>
                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                    <?php
                    }
                    ?>

					</select>
					
					<br>
				</div>

				<h4>Harga: </h4>
				<input name="total" id="total" value="Rp. 0" readonly></input> 
			
				<h4>Payment Type:</h4>
				<select id="paymentType" name="paymentType" class="form-select" required>
					<option value="">- Pilih Jenis Pembayaran -</option>
					<option value="Card">Debit / Credit</option>
					<option value="PayPal">PayPal</option>
				</select>
				
				<br>
			<!--
				<h4> DP: </h4>
				<input type="text" name="dp" id="dp" class="form-control"> </input>
			-->
				<h4>Rent Duration:</h4>
				<select id="rentDuration" name="rentDuration" class="form-select" required>
					<option value="default">- Pilih Durasi Penyewaan -</option>
					<option value="rentDuration_monthly">1 Month (Monthly)</option>
					<option value="rentDuration_quarterly">3 Months (Quarterly)</option>
					<option value="rentDuration_semiannual">6 Months (Semi Annual)</option>
					<option value="rentDuration_annually">12 Months (Annually)</option>
				</select>

				<br>

				<!--<button type="submit" onclick="FungsiNilai()" class="but btn btn-success">Purchase</button>-->

				<br>

				<input class="but btn btn-success" type="submit" name="submit" value="PURCHASE" style="color: green">
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
	
	$('#serverType').change(function()
	{
		var serverType = $('#serverType option:selected').text();
		$.get('getPriceHandler.php?selection=getPrice&serverID=' + serverType + '', function(data)
		{
			//'Rp. ' + 
			$('#total').val(data);
			$('#rentDuration').val("default");
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

