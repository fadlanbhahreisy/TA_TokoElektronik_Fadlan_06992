<?php
require "connect.php";
class modelbarang extends connect{
    private $databarang;
    private $kode=0;
    private $idbaru;
    function select(){
        $sqltext = "SELECT * FROM BARANG_06992";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        while ($row=oci_fetch_array($statement,OCI_BOTH)){
            $data[]=$row;

            if($this->kode<$row["ID_BARANG"]){
                $this->kode=$row["ID_BARANG"];
            }
        }
        return $this->databarang=$data;
        oci_free_statement($statement);

    }
    function select_id($id_barang){
        $sqltext = "SELECT * FROM BARANG_06992 WHERE ID_BARANG = '$id_barang'";
                        $statement = oci_parse($this->koneksi,$sqltext);
                        oci_execute($statement);
                        $row=oci_fetch_array($statement,OCI_BOTH);
    }
    function insert($idbrg,$nmbrg,$hrgbrg){
        $sqltext = "INSERT INTO BARANG_06992 VALUES('$idbrg','$nmbrg','$hrgbrg')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function getdata(){
        return $this->databarang;
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
    function delete($idbrg){
        $sqltext = "DELETE FROM BARANG_06992 WHERE ID_BARANG='$idbrg'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function update($idbrg,$nmbrg,$hrgbrg){
        $sqltext = "UPDATE BARANG_06992 SET NAMA_BARANG='$nmbrg',HARGA_BARANG='$hrgbrg' WHERE ID_BARANG='$idbrg'";
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
//$objmodelbarang = new modelbarang();
//$objmodelbarang->insert('3','kipas','5000');
//$objmodelbarang->delete('3');
//$objmodelbarang->update('2','tv','6000');
//$objmodelbarang->select();
//$objmodelbarang->viewdata();
?>