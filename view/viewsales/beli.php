<?php
session_start();

    if(!isset($_SESSION["sales"])){
      header("location:../../view/index.php"); 
    }
              
  //mendapatkan id barang
      $id_barang = $_GET['id'];
      if(isset($_SESSION['cart'][$id_barang])){
        $_SESSION['cart'][$id_barang]+=1;
      }else{
        $_SESSION['cart'][$id_barang]=1;
      }

echo "<script>location='keranjang.php';</script>";
?>
                