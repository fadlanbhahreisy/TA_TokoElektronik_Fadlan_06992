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
    <link rel="stylesheet" href="../../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
            <h3 class=""><i class="fas fa-cash-register mr-3"></i>Pemesanan Barang</h3><hr class="bg-secondary">
                
                    <h1 class="mt-5 text-center">PRODUK</h1>
                    <div class="row">
                    <?php
                    require "../../model/modelbarang.php";
                    $objbrg=new modelbarang();
                    $objbrg->select();
                    //$objbrg->viewdata();
                    $databarang = $objbrg->getdata();
                               
                      foreach ($databarang as $key) {
                        ?>
                      <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Nama = <?php echo $key['NAMA_BARANG'] ?></h5>
                            <p class="card-text">Harga = Rp. <?php echo $key['HARGA_BARANG'] ?></p>
                            <a href="beli.php?id=<?php echo $key['ID_BARANG'] ?>" class="btn btn-primary">beli</a>
                          </div>
                        </div>
                      </div>
                      <?php }?> 
                    </div>

          </div>
        </div>
      </div>
    </div>
        
    

    <div class="modal fade" id="tambahpesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Detail Pemesanan
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
    <!-- bootstrap datepicker -->
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