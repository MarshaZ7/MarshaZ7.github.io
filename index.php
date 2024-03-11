<?php
require_once('koneksi.php');
$sql = "SELECT * FROM mahasiswa";
$row = $koneksi->prepare($sql);
$row->execute();
$hasil = $row->fetchAll();
$a = 1;
foreach ($hasil as $isi) {
?>
<tr>
<td><?php echo $a ?></td>
<td><?php echo $isi['nim'] ?></td>
<td><?php echo $isi['nama']; ?></td>
<td><?php echo $isi['jurusan']; ?></td>
<td style="text-align: center;">
<a href="edit.php?nim=<?php echo $isi['nim']; ?>" class="btn btn-success btn-md">Edit
<span class="fa fa-edit"></span>
</a>
<a onclick="return confirm('Apakah yakin data akan dihapus?')"href="hapus.php?nim=<?php echo $isi['nim']; ?>"class="btn btn-danger btn-md">Hapus
<span class="fa fa-trash"></span>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</a>
</td>
</tr>
<?php
$a++;
}   
?>
</tbody>
</table>
</div>
</div>
</div>
</body>
</html>
