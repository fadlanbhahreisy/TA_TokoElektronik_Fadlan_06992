<?php
require "../model/modelpelanggan.php";

class prosespelanggan{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelpel=new modelpelanggan();
        
        if ($this->action=="tambah"){
            $idpel=$_POST['inputidpelanggan'];
            $namapel=$_POST['inputnamapelanggan'];
            $no_telp=$_POST['inputnotelp'];
            $objmodelpel->insert($idpel,$namapel,$no_telp);
            header("location:../view/viewadmin/viewpelanggan.php"); 
        }elseif($this->action=="hapus"){
            $idpel=$_GET['idpelanggan'];
            $objmodelpel->delete($idpel);
            header("location:../view/viewadmin/viewpelanggan.php");  
        }elseif($this->action=="edit"){
            $idBarang=$_POST['updateidpelanggan'];
            $namaBarang=$_POST['updatenamapelanggan'];
            $hargaBarang=$_POST['updatenotelp'];
            echo $idBarang;
            echo $namaBarang;
            echo $hargaBarang;
            $objmodelpel->update($idBarang,$namaBarang,$hargaBarang);
            header("location:../view/viewadmin/viewpelanggan.php"); 
        }
    }
}
$objprosespelanggan = new prosespelanggan($_GET['aksi']);
$objprosespelanggan->proses();
?>