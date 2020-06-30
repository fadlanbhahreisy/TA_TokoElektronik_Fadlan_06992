<?php
require "../model/modelsales.php";

class prosessales{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelsal=new modelsales();
        
        if ($this->action=="tambah"){
            $idSales=$_POST["inputidsales"];
            $namasal=$_POST['inputnamasales'];
            $pass=$_POST['inputpasswordsales'];
            $objmodelsal->insert($idSales,$namasal,$pass);
            header("location:../view/viewadmin/viewSales.php"); 
        }elseif($this->action=="hapus"){
            $idsales=$_GET['idsales'];
            $objmodelsal->delete($idsales);
            header("location:../view/viewadmin/viewSales.php"); 
        }elseif($this->action=="edit"){
            $idSales=$_POST['updateidsales'];
            $namaSales=$_POST['updatenamasales'];
            $pass=$_POST['updatepasssales'];
            $objmodelsal->update($idSales,$namaSales,$pass);
            header("location:../view/viewadmin/viewSales.php"); 
        }
    }
}
$objprosessales = new prosessales($_GET['aksi']);
$objprosessales->proses();
?>