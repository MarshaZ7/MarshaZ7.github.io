<?php
require_once('koneksi.php');

// Untuk menangani proses edit mahasiswa ke database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Menangkap data post
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    // Data yang akan diupdate
    $data[] = $nama;
    $data[] = $jurusan;
    $data[] = $nim;

    // Simpan data mahasiswa
    $sql = 'UPDATE mahasiswa SET nama=?, jurusan=? WHERE nim=?';
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    // Redirect
    echo '<script>alert("Berhasil Edit Data");window.location="index.php"</script>';
}

// Untuk menampilkan data mahasiswa berdasarkan nim mahasiswa
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $sql = "SELECT * FROM mahasiswa WHERE nim=?";
    $row = $koneksi->prepare($sql);
    $row->execute([$nim]);
    $hasil = $row->fetch();
    if (!$hasil) {
        echo '<script>alert("NIM Mahasiswa tidak valid");window.location="index.php"</script>';
        exit;
    }
} else {
    echo '<script>alert("NIM Mahasiswa tidak valid");window.location="index.php"</script>';
    exit;
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Edit Mahasiswa - <?php echo $hasil['nama']; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="container">
        <h2>DATA MAHASISWA</h2>
        <br />
        <h3>Edit Mahasiswa - <?php echo $hasil['nama']; ?></h3>
        <br />
        <div class="row">
            <div class="col-lg-6 mb-3">
                <form action="" method="POST">
                    <div class="form-group mb-3">
                        <label>NIM</label>
                        <input type="text" value="<?php echo $hasil['nim']; ?>" class="form-control" name="nim" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" value="<?php echo $hasil['nama']; ?>" class="form-control" name="nama">
                    </div>
                    <div class="form-group mb-3">
                        <label>Jurusan</label>
                        <input type="text" value="<?php echo $hasil['jurusan']; ?>" class="form-control"
                            name="jurusan">
                    </div>
                    <button class="btn btn-primary btn-md" name="update"><i class="fa fa-edit"> </i> Update</button>
                    <a class="btn btn-secondary" href="index.php" role="button"> <i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/dcdfffc6a8.js" crossorigin="anonymous"></script>
</body>
</html>