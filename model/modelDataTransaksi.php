<?php
require "connect.php";
class modelDataTransaksi extends connect{
    private $datatransaksi;
    private $pesanan;
    private $kembali;
    private $kode=0;
    private $idbaru;
    private $detail;
    private $detailtransaksi;
    function select(){
        $sqltext = "SELECT A.ID_TRANSAKSI, B.NAMA_PELANGGAN, B.TOTAL, A.BAYAR, A.KEMBALI,
        B.TANGGAL, C.NAMA_KASIR, B.NAMA_SALES ,B.ID_PESAN
        FROM TRANSAKSI_06992 A JOIN LIST_PEMESANAN B
        ON A.ID_PESAN = B.ID_PESAN JOIN KASIR_06992 C
        ON A.ID_KASIR = C.ID_KASIR";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);

        //variabel data barang diisi dari DB
        $temp;
        while($row=oci_fetch_array($statement,OCI_BOTH)){
            $temp[] = $row;
            if($this->kode<$row["ID_TRANSAKSI"]){
                $this->kode=$row["ID_TRANSAKSI"];
            }
        }
        $this->datatransaksi=$temp;
    }
    function getData(){
        return $this->datatransaksi;
    }
    function ambilpesanan($idpesan){
        $sqltext = "SELECT * FROM LIST_PEMESANAN WHERE ID_PESAN='$idpesan'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $data=oci_fetch_array($statement,OCI_BOTH);
        oci_free_statement($statement);
        $this->datatransaksi = $data;
    }
    function getpesanan(){
        return $this->datatransaksi;
    }
    function hitungkembalian($bayar,$totalharga){
        $this->kembali = $bayar-$totalharga;
    }
    function getkembalian(){
        return $this->kembali;
    }
    function setidbaru(){
        return $this->idbaru=$this->kode+1;
    }
    function getidbaru(){
        return $this->idbaru;
    }
    function inserttransaksi($idtransaksi,$bayar,$kembali,$idpesan,$idkasir){
        $sqltext = "INSERT INTO TRANSAKSI_06992 VALUES ('$idtransaksi','$bayar','$kembali','$idpesan','$idkasir')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function updatepesan($idtransaksi,$idpesan){
        $sqltext = "UPDATE PESAN_06992 SET ID_TRANSAKSI='$idtransaksi' WHERE ID_PESAN='$idpesan'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function selectdetail($id_pesan){
        $sqltext = "SELECT * FROM LIST_DETAIL WHERE ID_PESAN='$id_pesan'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $temp;
        while($row=oci_fetch_array($statement,OCI_BOTH)){
            $temp[] = $row;
        }
        $this->detail=$temp;
    }
    function selecttransaksi($id_transaksi){
        $sqltext = "SELECT * FROM LIST_TRANSAKSI WHERE ID_TRANSAKSI='$id_transaksi'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $this->detailtransaksi=oci_fetch_array($statement,OCI_BOTH);
    }
    function getdetail(){
        return $this->detail;
    }
    function getdetailtransaksi(){
        return $this->detailtransaksi;
    }
}
//$obj = new modelDataTransaksi();
//
?>