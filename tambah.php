<?php
require_once('koneksi.php');

// Inisialisasi variabel
$nim = "";
$nama = "";
$jurusan = "";

// berikut script untuk proses tambah mahasiswa ke database 
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nama'])) {
    // Menangkap data post
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];    
    $jurusan = $_POST['jurusan'];

    // Simpan data mahasiswa

    $sql = 'INSERT INTO mahasiswa (nim, nama, jurusan) VALUES (:nim, :nama, :jurusan)';
    $stmt = $koneksi->prepare($sql);
    $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
    $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);    
    $stmt->bindParam(':jurusan', $jurusan, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Redirect jika berhasil
        echo '<script>alert("Berhasil Tambah Data");window.location="index.php"</script>';
    } else {
        // Tampilkan pesan jika gagal
        echo '<script>alert("Gagal Tambah Data");</script>';
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt - 5">
        <h2>DATA MAHASISWA</h2>
        <br />
        <h3>Tambah Mahasiswa</h3>
        <br />
        <div class="row">
            <div class="mt - 3">
                <form action="" method="POST">
                    <div class="mt-3">
                        <label>NIM</label>
                        <input type="number" value="<?php echo $nim; ?>" class="form-control" name="nim"
                            placeholder="Masukkan NIM" required>
                    </div>
                    <div class=" mt-3">
                        <label>Nama</label>
                        <input type="text" value="<?php echo $nama; ?>" class="form-control" name="nama"
                            placeholder="Masukkan Nama" required>
                    </div>
                    <div class="mt-3">
                        <label>Jurusan</label>
                        <input type="text" value="<?php echo $jurusan; ?>" class="form-control" name="jurusan"
                            placeholder="Masukkan Jurusan" required>
                    </div><br>
                    <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Create</button>
                    <a class="btn btn-secondary" href="index.php" role="button"><i class="fa-solid fa-arrow-left"></i>
                        Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/dcdfffc6a8.js" crossorigin="anonymous"></script>
</body>

</html>