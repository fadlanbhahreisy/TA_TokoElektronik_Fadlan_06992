<?php
require "../model/modelkasir.php";

class proseskasir{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelkasir=new modelkasir();
        
        if ($this->action=="tambah"){
            $idKasir=$_POST["inputidkasir"];
            $namakasir=$_POST['inputnamakasir'];
            $passkasir=$_POST['inputpasswordkasir'];
            $objmodelkasir->insert($idKasir,$namakasir,$passkasir);
            header("location:../view/viewadmin/viewKasir.php"); 
        }elseif($this->action=="hapus"){
            $idkasir=$_GET['idkasir'];
            $objmodelkasir->delete($idkasir);
            header("location:../view/viewadmin/viewKasir.php"); 
        }elseif($this->action=="edit"){
            $idKasir=$_POST['updateidkasir'];
            $namaKasir=$_POST['updatenamakasir'];
            $pass=$_POST['updatepasskasir'];
            $objmodelkasir->update($idKasir,$namaKasir,$pass);
            header("location:../view/viewadmin/viewKasir.php"); 
        }
    }
}
$objproseskasir = new proseskasir($_GET['aksi']);
$objproseskasir->proses();
?>