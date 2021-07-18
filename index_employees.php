<?php 
include 'config/connection.php';
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
	<!-- <script src="assets/js/script.js"> </script> -->
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="assets/vendor/dashboard/dashboard.js"></script> -->

    <title>AHC | Employee List</title>

    <script language="javascript" type="text/javascript">
        function loadlink()
        {
			/*
            $('#time').load('time.php',function () 
            {
                $(this).unwrap();
            });
			*/
			$.get("date-time.php", function(data)
            {
				// Display the returned data in browser
                $("#time").html(data);
            });
        }

        $(document).ready(function(){
            // $("button").click(function()
            // {
                setInterval(function()
                {
                    loadlink() // this will run after every 5 seconds
                }, 1000);

			/*
                $.get("date-time.php", function(data)
                {
                    // Display the returned data in browser
                    $("#time").html(data);
                });
			*/
            // });
        });
    </script>
</head>
<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Universitas Dinamika</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </header>

    <div class="container">
        <!-- -->
        <br>
        <!-- -->
        <br>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_employee" ><i class=""></i>➕ Tambah Data</button>
        <hr>
        <table id="main-table" class="table" style="background-color: #FFFFFF;">
            <thead>
                <tr>
                <th scope="col" style="width: 5%"></th>
                <th scope="col" style="width: 5%">Number</th>
                <th scope="col" style="width: 5%">Employee ID</th>
                <th scope="col" style="width: 15%">Nama</th>
                <th scope="col" style="width: 13%">Date of Birth</th>
                <th scope="col" style="width: 13%">Jobdesk</th>
                <th scope="col" style="width: 8%"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $nomor = 1;
                    $query = mysqli_query($conn, "SELECT *, DATE_FORMAT(Birthdate, '%d %M %Y') AS Birthdate FROM Employees order by id asc");
                    while ($row = mysqli_fetch_assoc($query)) {
                ?>

                <tr>
                <td>
                <button type="button" id="button_delete" class="btn" style="background-color: #eeeded;"><i class="ml-1"></i>❌</button>
                </td>                    
                    <th scope="row" style="padding-left: 30px;">
                    <?php echo $nomor++;?>
                    </th>
                    <td><?php echo $row['ID']?></td>
                    <td><?php echo $row['Name']?></td>
                    <td><?php echo $row['Birthdate']?></td>
                    <td><?php echo $row['Job']?></td>
                    <td>
                    <button type="button" id="button_update" class="btn" style="background-color: #eeeded; color: #686d76;"><i class="ml-1"></i>✏️ Update Data</button>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
        

    </div>

    <div id="time">
            <h1></h1>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add_employee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="employeeHandler.php?act=tambah" class="form" method="post">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="employeeID" class="form-label">Employee ID</label>
                    <input type="text" class="form-control" id="employeeID" name="employeeID" required placeholder="Example: 19410100001">
                </div> 
                <div class="mb-3">
                    <label for="employeeName" class="form-label">Employee Name</label>
                    <input type="text" class="form-control" id="employeeName" name="employeeName" required placeholder="Example: Andi">
                </div>  
                <div class="mb-3">
                    <label for="employeeBirthdate" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="employeeBirthdate" name="employeeBirthdate" required>
                </div>  
                <div class="mb-3">
                    <label for="employeeJob" class="form-label">Jobdesk</label>
                    <select class="form-select" aria-label="Default select example" id="employeeJob" name="employeeJob" required>
					<option disabled selected>< - Job Desk - ></option>
					<!--
                    <?php
					/*
                        $sql = "SELECT DISTINCT kota_asal from track order by kota_asal ASC";
                        $q = mysqli_query($conn,$sql);

                        while ($row = mysqli_fetch_array($q)) {                        
                    ?>
                    <option value="<?php echo $row['kota_asal']; ?>"><?php echo $row['kota_asal']; ?></option>
                    <?php
                    }
					*/
                    ?>
					-->
                        <option value="Administrator">Administrator</option>
                        <option value="Customer Support">Customer Support</option>
                    </select>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: white;">Batal</button>
                <button type="submit" class="btn btn-success" style="color: white;">Simpan</button>
            </div>
            </form>
            </div>
        </div>
    </div>

	<!-- Update -->
	<div class="modal fade" id="update_employee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="employeeHandler.php?act=update" class="form" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                    <label for="employeeID" class="form-label">Employee ID</label>
                    <input type="text" class="form-control" id="update_employeeID" name="update_employeeID" required placeholder="Example: 19410100001">
                </div> 
                <div class="mb-3">
                    <label for="employeeName" class="form-label">Employee Name</label>
                    <input type="text" class="form-control" id="update_employeeName" name="update_employeeName" required placeholder="Example: Andi">
                </div>  
                <div class="mb-3">
                    <label for="employeeBirthdate" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="update_employeeBirthdate" name="update_employeeBirthdate" required>
                </div>  
                <div class="mb-3">
                    <label for="employeeJob" class="form-label">Jobdesk</label>
                    <select class="form-select" aria-label="Default select example" id="update_employeeJob" name="update_employeeJob" required>
					<option disabled selected>< - Job Desk - ></option>
					<!--
                    <?php
					/*
                        $sql = "SELECT DISTINCT kota_asal from track order by kota_asal ASC";
                        $q = mysqli_query($conn,$sql);

                        while ($row = mysqli_fetch_array($q)) {                        
                    ?>
                    <option value="<?php echo $row['kota_asal']; ?>"><?php echo $row['kota_asal']; ?></option>
                    <?php
                    }
					*/
                    ?>
					-->
                        <option value="Administrator">Administrator</option>
                        <option value="Customer Support">Customer Support</option>
                    </select>
                </div>  
                </div>
            <div class="row">
                    <div class="modal-footer col-6">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: white;">Batal</button>
                    </div>
    				<br>

                    <div class="modal-footer col-6">
                        <button type="submit" class="btn btn-success" style="color: white;">Update & Simpan</button>
                    </div>
    				
            </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Delete -->
	<div class="modal fade" id="delete_employee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Employee Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="employeeHandler.php?act=delete" class="form" method="post">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="delete_employeeID" class="form-label">Employee ID</label>
                    <input type="text" class="form-control" id="delete_employeeID" name="delete_employeeID" required placeholder="Example: 1" readonly>
                    <br>
                    <input type="text" class="form-control" oninput="deleteConfirmation()" id="delete_konfirmasi" name="delete_konfirmasi" required placeholder="Ketik 'KONFIRMASI' untuk membuka Tombol Hapus">
                </div> 
                <div class="row">
                    <div class="modal-footer col-6">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: white;">Batal</button>
                    </div>
    				<br>

                    <div class="modal-footer col-6">
                        <button id="button_delete_confirm" type="submit" class="btn btn-success" style="color: white;" disabled>Delete & Save</button>
                    </div>
            </div>
            </form>
            </div>
        </div>
    </div>

    <script>
    function deleteConfirmation()
    {
        let inputVal = document.getElementById("delete_konfirmasi").value;
        if (inputVal == "KONFIRMASI")
        {
            $('#button_delete_confirm').prop('disabled', false);
        }
        else 
            $('#button_delete_confirm').prop('disabled', true);
    }
    </script>

    <script>
    $(document).ready(function()
    {
        $('#main-table tr #button_update').on('click', function()
        {
            var currentRow = $(this).closest("tr");
            var column1 = currentRow.find("td:eq(1)").text();
            var column2 = currentRow.find("td:eq(2)").text();
            var column3 = currentRow.find("td:eq(3)").text();
            var column4 = currentRow.find("td:eq(4)").text();
            $('#update_employeeID').val(column1);
            $('#update_employeeName').val(column2);
            $('#update_employeeBirthdate').val(column3);
            $('#update_employeeJob').val(column4);
            $('#update_employee').modal('show');
        });

        $('#main-table tr #button_delete').on('click', function()
        {
            var currentRow = $(this).closest("tr");
            var column1 = currentRow.find("td:eq(1)").text();
            $('#delete_employeeID').val(column1);
            $('#delete_employee').modal('show');
        });
    });
    </script>
</body>
</html>