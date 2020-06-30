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
    <title>HALAMAN KASIR</title>
  </head>
  <body>
   
  <?php include("navbar.php")?>
  <?php
    if(!isset($_SESSION["kasir"])){
      header("location:../../view/index.php"); 
    }
  ?>
    <div class="row no-gutters mt-5">
    <?php include("sidebar.php")?>
      <div class="col-md-10">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h3 class=""><i class="fas fa-cash-register mr-3"></i>Tabel Data Transaksi</h3><hr class="bg-secondary">

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>Id Transaksi</th>
                          <th>Id Pesan</th>
                          <th>Nama Pelanggan</th>
                          <th>Total</th>
                          <th>Bayar</th>
                          <th>Kembali</th>
                          <th>Tanggal</th>
                          <th>Nama Kasir</th>
                          <th>Nama Sales</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
              <?php
            require "../../model/modelDataTransaksi.php";
            $objpesan=new modelDataTransaksi();
            $objpesan->select();
            //$objbrg->viewdata();
            $datapesan=$objpesan->getData();           
              foreach ($datapesan as $key) {
                ?>
              <tr>
                  <td><?php echo $key['ID_TRANSAKSI'] ?></td>
                  <td><?php echo $key['ID_PESAN'] ?></td>
                  <td><?php echo $key['NAMA_PELANGGAN'] ?></td>
                  <td><?php echo $key['TOTAL'] ?></td>
                  <td><?php echo $key['BAYAR'] ?></td>
                  <td><?php echo $key['KEMBALI'] ?></td>
                  <td><?php echo $key['TANGGAL'] ?></td>
                  <td><?php echo $key['NAMA_KASIR'] ?></td>
                  <td><?php echo $key['NAMA_SALES'] ?></td>
                <td>
                  <a class="btn btn-success" href="detailtransaksi.php?idtransaksi=<?php echo $key['ID_TRANSAKSI'] ;?>&idpesan=<?php echo $key['ID_PESAN'] ;?>"><i class="fas fa-play p-2 "></i></a>
                </td>
              </tr>
              
              <?php }?>  
              
              </tbody>
                  <tfoot>
                      <tr>
                          <th>Id Transaksi</th>
                          <th>Id Pesan</th>
                          <th>Nama Pelanggan</th>
                          <th>Total</th>
                          <th>Bayar</th>
                          <th>Kembali</th>
                          <th>Tanggal</th>
                          <th>Nama Kasir</th>
                          <th>Nama Sales</th>
                          <th>Action</th>
                      </tr>
                  </tfoot>
            </table>
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