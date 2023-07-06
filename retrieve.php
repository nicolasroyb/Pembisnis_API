<?php
require("koneksi.php");

$perintah = "SELECT * FROM bisnis";
$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek);

if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Data Tersedia!";
        $response["Data"] = array();
        
        while($get = mysqli_fetch_object($eksekusi)){
            $var["Id"] = $get->Id;
            $var["Nama"] = $get->Nama;
            $var["jenis"] = $get->jenis;
            $var["awal"] = $get->awal;
            $var["pendapatan"] = $get->pendapatan;
            $var["asal"] = $get->asal;
            
            array_push($response["Data"], $var);
        }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "tidak ada data";
}
echo json_encode($response);
mysqli_close($konek);
