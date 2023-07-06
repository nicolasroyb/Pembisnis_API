<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $nama = $_POST["Nama"];
    $jenis = $_POST["jenis"];
    $awal = $_POST["awal"];
    $pendapatan = $_POST["pendapatan"];
    $asal = $_POST["asal"];
    
    $perintah = "INSERT INTO bisnis (nama, jenis, awal, pendapatan, asal) VALUES('$nama','$jenis','$awal','$pendapatan','$asal')";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses menyimpan data!";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal menyimpan data!";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada data yang dikirim!";
}
echo json_encode($response);
mysqli_close($konek);