<?php
require "connect.php";
class modelsales extends connect{
    public $datasales;
    private $kode=0;
    private $idbaru;

    function select(){
        $sqltext = "SELECT * FROM SALES_06992";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        while ($row=oci_fetch_array($statement,OCI_BOTH)){
            $data[]=$row;

            if($this->kode<$row["ID_SALES"]){
                $this->kode=$row["ID_SALES"];
            }
        }
        return $this->datasales=$data;
        oci_free_statement($statement);
    }

    function viewdata(){
        foreach ($this->datasales as $key) {
            echo $key['ID_SALES'];
            echo $key['NAMA_SALES'];
            echo $key['PASSWORD'];
            echo '<br>';
        }
    }
    function getdata(){
        return $this->datasales;
    }
    function insert($idsales,$namasales,$password){
        $sqltext = "INSERT INTO SALES_06992 VALUES ($idsales,'$namasales','$password')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function update($idsales,$namasales,$password){
        $sqltext = "UPDATE SALES_06992 SET NAMA_SALES='$namasales',PASSWORD='$password' WHERE ID_SALES='$idsales'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function delete($idsales){
        $sqltext = "DELETE FROM SALES_06992 WHERE ID_SALES='$idsales'";
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
//$sal = new modelsales();
?>
