<?php
session_start();
unset($_SESSION["sales"]);
header("location:../../view/index.php");
?>