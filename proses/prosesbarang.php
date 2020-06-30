<?php
require "../model/modelbarang.php";

class prosesbarang{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelbrg=new modelbarang();
        
        if ($this->action=="tambah"){
            $idbrg=$_POST['inputidbarang'];
            $namabrg=$_POST['inputnamabarang'];
            $hargabrg=$_POST['inputhargabarang'];
            $objmodelbrg->insert($idbrg,$namabrg,$hargabrg);
            header("location:../view/viewadmin/viewBarang.php"); 
        }elseif($this->action=="hapus"){
            $idbarang=$_GET['idbarang'];
            $objmodelbrg->delete($idbarang);
            header("location:../view/viewadmin/viewBarang.php"); 
        }elseif($this->action=="edit"){
            $idBarang=$_POST['updateidbarang'];
            $namaBarang=$_POST['updatenamabarang'];
            $hargaBarang=$_POST['updatehargabarang'];
            $objmodelbrg->update($idBarang,$namaBarang,$hargaBarang);
            header("location:../view/viewadmin/viewBarang.php"); 
        }
    }
}
$objprosesbarang = new prosesbarang($_GET['aksi']);
$objprosesbarang->proses();

?>