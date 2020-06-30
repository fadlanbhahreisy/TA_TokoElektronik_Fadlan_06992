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
            <h1 class=""><i class="fas fa-cash-register mr-3"></i>struk</h1><hr class="bg-secondary">
            <?php
            require "../../model/modelDataTransaksi.php";
            $id_pesan=$_GET["idpesan"];
            $idtransaksi=$_GET["idtransaksi"];
            $objek=new modelDataTransaksi();
            $objek->selectdetail($id_pesan);
            $objek->selecttransaksi($idtransaksi);
            $datatransaksi = $objek->getdetailtransaksi();
            $datadetail = $objek->getdetail(); 
            ?>
            <from>
                <div class="row">
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Id Transaksi</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["ID_TRANSAKSI"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Id Pesan</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["ID_PESAN"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Nama Pelanggan</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["NAMA_PELANGGAN"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Total</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["TOTAL"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Bayar</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["BAYAR"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Kembali</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["KEMBALI"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Tanggal</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["TANGGAL"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Nama Kasir</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["NAMA_KASIR"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Nama Sales</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["NAMA_SALES"]?>"> 
                            </div>
                        </div>
                </div>
            </form>
            </br>
            <table class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>Nama Barang</th>
                          <th>harga Barang</th>
                          <th>Qty</th>
                          <th>Subtotal</th>
                      </tr>
                  </thead>
                  <tbody>
              <?php
                    
              foreach ($datadetail as $key) {
                ?>
              <tr>
                  <td><?php echo $key['NAMA_BARANG'] ?></td>
                  <td><?php echo $key['HARGA_BARANG'] ?></td>
                  <td><?php echo $key['QTY'] ?></td>
                  <td><?php echo $key['SUBTOTAL'] ?></td>
              </tr>
              
              <?php }?>  
              
              </tbody>
                  <tfoot>
                      <tr>
                          <th colspan="3">Total</th>
                          <th><?php echo $datatransaksi["TOTAL"]?></th>
                      </tr>
                  </tfoot>
            </table>
            <button onclick="window.print()">Print</button>
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