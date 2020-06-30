<?php
session_start();
unset($_SESSION["cart"]);
echo "<script>location='../view/viewsales/viewpemesanan.php';</script>";
?>