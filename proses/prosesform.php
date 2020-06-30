<?php
session_start();
//require "../model/connect.php";
//oci_connect("fadlan_bhahreisy","fadlan","localhost/XE");
class prosesform{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        if ($this->action=="act"){
            $nama=$_POST["namapelanggan"];
            $telp=$_POST["no_telppelanggan"];
            $sqltext = "SELECT COUNT(*) FROM PELANGGAN_06992 WHERE NAMA_PELANGGAN='$nama' AND NO_TELP='$telp'";
            $statement = oci_parse(oci_connect("alan_06992","alan","localhost/XE"),$sqltext);
            oci_execute($statement);
            $key=oci_fetch_array($statement,OCI_BOTH);
            $hitung = $key["COUNT(*)"];
            if($hitung==1){
                $query = "SELECT * FROM PELANGGAN_06992 WHERE NAMA_PELANGGAN='$nama' AND NO_TELP='$telp'";
                $statemen = oci_parse(oci_connect("alan_06992","alan","localhost/XE"),$query);
                oci_execute($statemen);
                $akun = oci_fetch_array($statemen,OCI_BOTH);
                echo $akun['NAMA_PELANGGAN'];
                $_SESSION["pelanggan"]=$akun;
                echo "<script>alert('sukses');</script>";
                echo "<script>location='../view/viewsales/checkout.php'</script>";
                
            }else{
                echo "<script>alert('nama tidak ada lapor ke admin');</script>";
                echo "<script>location='../view/viewsales/form.php'</script>";
            }
            
        }    
    }
}
$objform = new prosesform($_GET['aksi']);
$objform->proses();
?>