<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "warnet";

$koneksi = mysqli_connect($host, $user, $pass, $db);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="cess/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendor/dashboard/dashboard.css">
    <title>Pengisian Data</title>
  </head>
  <br>
  <body>

    <div class="container">
      <!-- Modal Input -->
      <div class="modal fade" id="modal_mhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Daftar Member</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="function/post_mahasiswa.php?act=tambah_member" class="form" method="post">
              <div class="modal-body">
                <div class="mb-3">
                    <label for="nim" class="form-label">Id Member</label>
                    <input type="text" class="form-control" id="id_member" name="id_member" required placeholder="Example: C023" required>
                </div>
                  <div class="mb-3">
                      <label for="nim" class="form-label">Total Jam</label>
                      <input type="text" class="form-control" id="tjam" name="tjam" required placeholder="Example: /jam" required>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-success">Simpan</button>
              </div>
              </form>
              </div>
          </div>
      </div>

      <!-- Modal Update -->
      <div class="modal fade" id="modal_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="function/post_mahasiswa.php?act=ubah" class="form" method="post">
              <div class="modal-body">
                <div class="mb-3">
                    <label for="nim" class="form-label">Id Member</label>
                    <input type="text" class="form-control" id="up_member" name="up_membe" required placeholder="Example: C023" required>
                </div>
                  <div class="mb-3">
                      <label for="nim" class="form-label">Total Jam</label>
                      <input type="text" class="form-control" id="up_jam" name="up_jam" required placeholder="Example: /jam" required>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" name="modal_update" class="btn btn-success">Simpan</button>
              </div>
              </form>
              </div>
          </div>
      </div>

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_mhs"><i class="bi bi-plus"></i> Tambah Member</button>
            <button onclick="fungsi()" id="show" class="btn btn-danger" type="hide" value="submit"> Hide </button>
            <div id="table">
              <table class="table table-hover table-striped" id="table_member">
                <caption>Data User</caption>
                <thead>
                  <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Id Member</th>
                    <th scope="col">Total Jam</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>

                <tbody id="simpan">
                  <?php
                    $nomor = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM warnet;");
                    while ($row = mysqli_fetch_assoc($query)) {
                ?>

                <tr>
                    <td><?php echo $row['id_member']?></td>
                    <td><?php echo $row['total_jam']?></td>
                    <td>
                      <button type="button" id="btn_del" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_del"> Delete</button>

                      <button type="button" id="btn_up" class="btn btn-primary" data-bs-dismiss="#modal_update"> Update</button>

                    </td>
                </tr>
                <?php
                    }
                ?>

                </tbody>

              </table>
            </div>
          </div>
        <!-- </div> -->
      <!--</form>-->
    </div>
    <div class="modal fade" id="modal_mhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="function/post_mahasiswa.php?act=tambah_member" class="form" method="post">
            <div class="modal-body">
              <div class="mb-3">
                  <label for="nim" class="form-label">Id Member</label>
                  <input type="text" class="form-control" id="id_member" name="id_member" required placeholder="Example: C023" required>
              </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">Total Jam</label>
                    <input type="text" class="form-control" id="tjam" name="tjam" required placeholder="Example: Hams" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/vendor/dashboard/dashboard.js"></script>
    <script type="text/javascript">

       var statusTable = true;

       $(document).ready(function(){
         $('#table_member tr #btn_up').click (function () {
                var currentRow=$(this).closest("tr");
                var col1=currentRow.find("td:eq(0)").text();
                var col2=currentRow.find("td:eq(1)").text();
               // var data=col1+"\n"+col2+"\n"+col3+"\n"+col4;
                //alert(data);
                $('#up_member').val(col1);
                $('#up_jam').val(col2);
                //swal("Hello world!",data);
                //$('#modalfooter').append("<button type='submit' class='btn btn-success'>Update</button><button type='submit' class='btn btn-success'>Delete</button>")
                $('#modal_update').modal('show');
            });

           $('btnShowHide').html("Hide");
         });

         $('.del').click(function(){
             $(this).closest('tr').remove();
         });

         function save(){
           var id = $('#id').val();
           var op = $('#op').val();
           var kerja = $('#kerja').val();
           var idm = $('#idm').val();
           var nama = $('#nama').val();
           var jam = $('#jam').val();

           var textHtml =
           "<tr> <td>"
           +op+
           "</td> <td>"
           +idm+
           "</td> <td>"
           +nama+
           "</td> <td>"
           +jam+
           "</td> </tr>";

           swal("Success", " ", "success");
           $('#simpan').append(textHtml);

        reset();
         }

         function cek(){
           swal("Success", " ", "Done");
         }

         function fungsi(){
             if(statusTable){
               $('#show').html("Show");
               $('#table').hide();
               $('#show').css("background-color = red");

               statusTable = false;
             }else{
               $('#show').html("Hide");
               $('#table').show();

               statusTable = true;
             }
         }

        /*function fungsi(){
          var x = document.getElementById("target")
          if (x.style.display == "none") {
            x.style.display = "block";
          }else {
            x.style.display = "none";
          }
        }*/


    </script>
  </body>
</html>
