<?php
class connect{
    protected $koneksi;
    private $uname="alan_06992";
    private $pass="alan";
    private $host="localhost/XE";

    function __construct()
    {
        $konek = oci_connect($this->uname,$this->pass,$this->host);
        if ($konek)
        {
            echo "";
            $this->koneksi=$konek;
        }else
        {
            echo "gagal";
        }
    }
}
$objkonek =new connect();
?>