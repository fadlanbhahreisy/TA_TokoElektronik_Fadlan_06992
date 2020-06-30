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
    
    <title>Hello, world!</title>
  </head>
  <body>
    
      <?php include("navbar.php")?>

    <div class="row no-gutters mt-5">
      <?php include("sidebar.php")?>
      <div class="col-md-10">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h3 class=""><i class="fas fa-users-cog mr-3"></i>DASHBOARD</h3><hr class="bg-secondary">
            <div class="row text-white mt-5">

              <div class="card bg-primary ml-5" style="width: 18rem;">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-user-friends mr-3"></i>
                  </div>
                  <h5 class="card-title">Jumlah Barang</h5>
                  <div class="display-4">1000</div>
                  <a href=""><p class="card-text text-white">detail<i class="fas fa-angle-double-right ml-2"></i></p></a>
                </div>
              </div>

              <div class="card bg-success ml-5" style="width: 18rem;">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-box-open mr-3"></i>
                  </div>
                  <h5 class="card-title">jumlah sales</h5>
                  <div class="display-4">1000</div>
                  <a href=""><p class="card-text text-white">detail<i class="fas fa-angle-double-right ml-2"></i></p></a>
                </div>
              </div>

              <div class="card bg-info ml-5" style="width: 18rem;">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-cash-register mr-3"></i>
                  </div>
                  <h5 class="card-title">Jumlah kasir</h5>
                  <div class="display-4">1000</div>
                  <a href=""><p class="card-text text-white">detail<i class="fas fa-angle-double-right ml-2"></i></p></a>
                </div>
              </div>

            

            </div>
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