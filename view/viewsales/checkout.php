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
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
          
                
            <h3 class=""><i class="fas fa-cash-register mr-3"></i>Pemesanan Anda</h3><hr class="bg-secondary">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $nomor=1;
                    $total_keseluruhan=0;
                    require "../../model/modelDataPemesanan.php";
                    $objpesan=new modelDataPemesanan();
                    $objpesan->select();
                    $objpesan->setidbaru();
                    ?>
                    <?php foreach ($_SESSION["cart"] as $id_barang => $jumlah) {?>
                    <?php 
                        $objpesan->selectid($id_barang);
                        $objpesan->setsubtotal($objpesan->viewhargabarang(),$jumlah);
                        
                    ?>
                        <tr>
                            <th scope="row"><?php echo $nomor ?></th>
                            <td><?php echo $objpesan->viewnamabarang()?></td>
                            <td>Rp. <?php echo $objpesan->viewhargabarang() ?></td>
                            <td><?php echo $jumlah ?></td>
                            <td>Rp. <?php echo $objpesan->getsubtotal() ?></td>
                        </tr>
                    <?php 
                    $nomor++;
                    $total_keseluruhan+=$objpesan->getsubtotal();
                    ?>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Total keseluruhan</th>
                            <th>Rp. <?php echo $total_keseluruhan ?></th>
                        </tr>
                    </tfoot>
                </table>
                <h3 class=""><i class="fas fa-cash-register mr-3"></i>Data Anda</h3><hr class="bg-secondary">
                <form method="post" action="../../proses/prosespesan.php?aksi=act">
                  <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                              <LABEL>Id Pesan</LABEL>
                            <input type="text" name="idpesanan" readonly value="<?php echo $objpesan->getidbaru() ?>" class="form-control">
                          </div>
                        </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <LABEL>nama</LABEL>
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["NAMA_PELANGGAN"]?>" class="form-control">
                          </div>
                        </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <LABEL>no telp</LABEL>
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["NO_TELP"]?>" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <LABEL>tanggal</LABEL>
                            <input type="text" name="tanggalpesan" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <LABEL>sales</LABEL>
                          <input type="text" readonly value="<?php echo $_SESSION["sales"]["NAMA_SALES"]?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <LABEL>total belanja</LABEL>
                            <input type="text" readonly name="totalbelanja" value="<?php echo $total_keseluruhan?>" class="form-control">
                          </div>
                      </div>
                    </div>    
                      <button type="submit" class="btn btn-primary">cetak</button>
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
    <script src="../../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    </script>
  </body>
</html>