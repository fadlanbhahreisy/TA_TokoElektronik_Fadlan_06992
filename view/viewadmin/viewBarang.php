
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
    <title>HALAMAN ADMIN</title>
  </head>
  <body>
  <?php include("navbar.php")?>

    <div class="row no-gutters mt-5">
    <?php include("sidebar.php")?>
      <div class="col-md-10">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h3 class=""><i class="fas fa-box-open mr-3"></i>Tabel barang</h3><hr class="bg-secondary">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tabelbarang"><i class="fas fa-plus-square mr-2"></i>Add barang</a>
            
              <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <td>ID Barang</td>
                  <td>Nama Barang</td>
                  <td>Harga Barang</td>
                  <td>Action</td>
                </tr>
              </thead>
              
              <tbody>
              <?php
            require "../../model/modelbarang.php";
            $objbrg=new modelbarang();
            $objbrg->select();
            $objbrg->setidbaru();
            //$objbrg->viewdata();
            $databarang = $objbrg->getdata();           
              foreach ($databarang as $key) {
                ?>
              <tr>
                  <td><?php echo $key['ID_BARANG'] ?></td>
                  <td><?php echo $key['NAMA_BARANG'] ?></td>
                  <td><?php echo $key['HARGA_BARANG'] ?></td>
                <td>
                  <a class="btn btn-success"><i class="fas fa-edit p-2 " data-toggle="modal" href="#updatebarang<?php echo $key['ID_BARANG'] ?>" title="edit"></i></a>
                  <a class="btn btn-danger" title="hapus" href= "../../proses/prosesbarang.php?aksi=hapus&idbarang=<?php echo $key['ID_BARANG']; ?>"><i class="fas fa-trash-alt p-2" data-toggle="tooltip" title="edit"></i></a>
                </td>
              </tr>
              <div class="modal fade" id="updatebarang<?php echo $key['ID_BARANG'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">update Barang baru</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="../../proses/prosesbarang.php?aksi=edit" method="post">
                        <div class="from-group">
                          <label>Id Barang</label>
                          <input type="text" id="updateidbarang" name="updateidbarang" value="<?php echo $key['ID_BARANG']; ?>" class="form-control" > 
                        </div>
                        <div class="from-group">
                          <label>Nama Barang</label>
                          <input type="text" id="updatenamabarang" name="updatenamabarang" value="<?php echo $key['NAMA_BARANG']; ?>" class="form-control"> 
                        </div>
                        <div class="from-group">
                          <label>Harga Barang</label>
                          <input type="text" id="updatehargabarang" name="updatehargabarang" value="<?php echo $key['HARGA_BARANG']; ?>" class="form-control"> 
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
              <?php }?>  
              
              </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>nama</th>
                    <th>Harga</th>
                    <th>action</th>
                </tr>
            </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="tabelbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../../proses/prosesbarang.php?aksi=tambah" method="post">
                <div class="from-group">
                  <label>Id Barang</label>
                  <input type="text" id="inputidbarang" name="inputidbarang" value="<?php echo $objbrg->getidbaru()?>"class="form-control"> 
                </div>
                <div class="from-group">
                  <label>Nama Barang</label>
                  <input type="text" id="inputnamabarang" name="inputnamabarang" class="form-control" placeholder="Input Nama Barang"> 
                </div>
                <div class="from-group">
                  <label>Harga Barang</label>
                  <input type="text" id="inputhargabarang" name="inputhargabarang" class="form-control" placeholder="Input Harga Barang"> 
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

    // Simpan Barang
    $( "#simpanBarang" ).click(function(e) {
      var idbarang = document.getElementById("idBarang").innerHTML;
      var namabarang = $("#namaBarang").val();
      var hargabarang = $("#hargaBarang").val();
      console.log(idBarang);
    });
    </script>
  </body>
</html>