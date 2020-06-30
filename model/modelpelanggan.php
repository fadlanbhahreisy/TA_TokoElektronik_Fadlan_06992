<?php
require "connect.php";
class modelpelanggan extends connect{
    private $datapelanggan;
    private $kode=0;
    private $idbaru;

    function select(){
        $sqltext = "SELECT * FROM PELANGGAN_06992";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        while ($row=oci_fetch_array($statement,OCI_BOTH)){
            $data[]=$row;

            if($this->kode<$row["ID_PELANGGAN"]){
                $this->kode=$row["ID_PELANGGAN"];
            }
        }
        return $this->datapelanggan=$data;
        oci_free_statement($statement);
    }
    function insert($idpel,$nmpel,$no_telp){
        $sqltext = "INSERT INTO PELANGGAN_06992 VALUES('$idpel','$nmpel','$no_telp')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function getdata(){
        return $this->datapelanggan;
    }
    
    function viewdata(){
        
        foreach ($this->databarang as $key){
            echo $key['ID_BARANG'];
            echo " = ";
            echo $key["NAMA_BARANG"];
            echo " = ";
            echo $key["HARGA_BARANG"];
            echo "<br>";
        }
    }
    function delete($idpel){
        $sqltext = "DELETE FROM PELANGGAN_06992 WHERE ID_PELANGGAN='$idpel'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function update($idpel,$nmpel,$no_telp){
        $sqltext = "UPDATE PELANGGAN_06992 SET NAMA_PELANGGAN='$nmpel',NO_TELP='$no_telp' WHERE ID_PELANGGAN='$idpel'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function setidbaru(){
        return $this->idbaru=$this->kode+1;
    }
    function getidbaru(){
        return $this->idbaru;
    }
}
?>