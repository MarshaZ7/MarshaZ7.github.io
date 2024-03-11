<?php
require_once('koneksi.php');
//untuk hapus data 
$nim = $_GET['nim'];
$sql = "DELETE FROM mahasiswa WHERE nim=?";
$row = $koneksi->prepare($sql);
$row ->execute(array($nim));

echo '<script>alert("Berhasil Hapus Data"),window.location="index.php"</script>';
?>