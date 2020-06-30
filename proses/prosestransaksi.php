<?php
session_start();
require "../model/modelDataTransaksi.php";

class prosesbarang{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objtran = new modelDataTransaksi();
        if($this->action="bayar"){
            $idtransaksi=$_POST["idtransaksi"];
            $bayar=$_POST["bayar"];
            $kembali=$_POST["kembali"];
            $idpesan=$_POST["idpesan"];
            $idkasir=$_SESSION["kasir"]["ID_KASIR"];
            $objtran->inserttransaksi($idtransaksi,$bayar,$kembali,$idpesan,$idkasir);
            $objtran->updatepesan($idtransaksi,$idpesan);
            header("location:../view/viewkasir/viewDataTransaksi.php");
        }
    }
}
$objprosesbarang = new prosesbarang($_GET['aksi']);
$objprosesbarang->proses();

?>