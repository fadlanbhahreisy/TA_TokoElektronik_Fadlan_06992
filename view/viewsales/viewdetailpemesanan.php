<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../../asset/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <title>HALAMAN SALES</title>
  </head>
  <body>
   
  <?php include("navbar.php")?>
  <?php
    if(!isset($_SESSION["sales"])){
      header("location:../../view/index.php"); 
    }
  ?>
    <div class="row no-gutters mt-5">
    <?php include("sidebar.php")?>
      <div class="col-md-10">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h3 class=""><i class="fas fa-cash-register mr-3"></i>Tabel Detail Pemesanan</h3><hr class="bg-secondary">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>Nama Barang</th>
                          <th>Qty</th>
                          <th>Subtotal</th>
                      </tr>
                  </thead>
                  <tbody>
              <?php
            require "../../model/modelDataPemesanan.php";
            $id_pesan=$_GET["idpesan"];

            $objpesan=new modelDataPemesanan();
            $objpesan->selectdetail($id_pesan);

            $datadetail = $objpesan->getdetail();         
              foreach ($datadetail as $key) {
                ?>
              <tr>
                  <td><?php echo $key['NAMA_BARANG'] ?></td>
                  <td><?php echo $key['QTY'] ?></td>
                  <td><?php echo $key['SUBTOTAL'] ?></td>
              </tr>
              
              <?php }?>  
              
              </tbody>
                  <tfoot>
                      <tr>
                          <th>Nama Barang</th>
                          <th>Qty</th>
                          <th>Subtotal</th>
                      </tr>
                  </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="tambahpesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Pemesanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../proses/proseskasir.php?aksi=tambah" method="post">
              <div class="from-group">
                  <label>Id pemesanan</label>
                  <input type="text" id="inputnamakasir" name="inputnamakasir" class="form-control" placeholder="Input Nama Kasir"> 
                </div>
                <div class="from-group">
                  <label>Nama Pelanggan</label>
                  <input type="text" id="inputnamakasir" name="inputnamakasir" class="form-control" placeholder="Input Nama Kasir"> 
                </div>
                <div class="from-group">
                  <label>pilih barang</label>
                  <input type="text" id="inputpasswordkasir" name="inputpasswordkasir" class="form-control" placeholder="Input password Kasir"> 
                </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger">reset</button>
                <button type="submit" class="btn btn-primary">Insert</button>
              </div>
           </form>
          </div>
          </div>
        </div>
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );
    </script>
  </body>
</html>