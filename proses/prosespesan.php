<?php
session_start();
require "../model/modelDataPemesanan.php";

class prosesbarang{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelpesan = new modelDataPemesanan();
        if($this->action=="act"){
            $idpesan = $_POST["idpesanan"];
            $idpelanggan = $_SESSION["pelanggan"]["ID_PELANGGAN"];
            $idsales = $_SESSION["sales"]["ID_SALES"];
            $tanggal = $_POST["tanggalpesan"];
            $totalbelanja = $_POST["totalbelanja"];
            $objmodelpesan->insert($idpesan,$idpelanggan,$idsales,$tanggal,$totalbelanja);
            foreach ($_SESSION["cart"] as $id_barang => $jumlah) {
                $sqltext = "SELECT * FROM BARANG_06992 WHERE ID_BARANG = '$id_barang'";
                    $statement = oci_parse(oci_connect("alan_06992","alan","localhost/XE"),$sqltext);
                    oci_execute($statement);
                    $key=oci_fetch_array($statement,OCI_BOTH);
                    $subtotal = $key['HARGA_BARANG']*$jumlah;
                    $objmodelpesan->insertdetail($jumlah,$subtotal,$idpesan,$id_barang);
            }    
            echo '<pre>';
            print_r($_SESSION["cart"]);
            echo '</pre>';
           

            unset($_SESSION["pelanggan"]);
            unset($_SESSION["cart"]);
            header("location:../view/viewsales/viewDataPemesanan.php");
        }
    }
}
$objprosesbarang = new prosesbarang($_GET['aksi']);
$objprosesbarang->proses();

?>