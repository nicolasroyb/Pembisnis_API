<?php
require("koneksi.php");

$response = array();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = $_POST["id"];
    
    $perintah = "DELETE FROM bisnis WHERE id = '$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses menghapus data!";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal menghapus data!";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada data yang dikirim!";
}
echo json_encode($response);
mysqli_close($konek);