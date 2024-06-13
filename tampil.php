
<?php
include "koneksi.php";
$tombol = $_POST['tombol'];

if($tombol=="Tambah")
{
    ?>
    <h2>Form Input Mahasiswa</h2>
    <form method="POST" action="eksekusi.php">
        Nim : <input type="TEXT" name="nim"><br>
        Nama : <input type="TEXT" name="nama"><br>
        <input type="SUBMIT" name="tombol" value="Simpan">
    </form>
    <?php
}elseif ($tombol == "Edit") {
    $id_mhs = $_POST['id_mhs'];
    $data = mysqli_query($koneksi, "SELECT * FROM tbl_mhs WHERE id_mhs='$id_mhs'");
    $d = mysqli_fetch_array($data);
    ?>
    <h2>Form Edit Mahasiswa</h2>
    <form method="POST" action="eksekusi.php">
        <input type="hidden" name="id_mhs" value="<?php echo $id_mhs; ?>">
        NIM: <input type="text" name="nim" value="<?php echo $d['nim']; ?>"><br>
        Nama: <input type="text" name="nama" value="<?php echo $d['nama']; ?>"><br>
        <input type="submit" name="tombol" value="Update">
    </form>
    <?php
} elseif ($tombol == "Simpan") {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    
    mysqli_query($koneksi, "INSERT INTO tbl_mhs (nim, nama) VALUES ('$nim', '$nama')");
    echo "<h2>Data berhasil disimpan</h2>";
    header('Refresh: 3; url=tampil.php');
    exit;
} elseif ($tombol == "Update") {
    $id_mhs = mysqli_real_escape_string($koneksi, $_POST['id_mhs']);
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    
    mysqli_query($koneksi, "UPDATE tbl_mhs SET nim='$nim', nama='$nama' WHERE id_mhs='$id_mhs'");
    echo "<h2>Data berhasil diupdate</h2>";
    header('Refresh: 3; url=tampil.php');
    exit;
} elseif ($tombol == "Hapus") {
    $id_mhs = mysqli_real_escape_string($koneksi, $_POST['id_mhs']);
    
    mysqli_query($koneksi, "DELETE FROM tbl_mhs WHERE id_mhs='$id_mhs'");
    echo "<h2>Data berhasil dihapus</h2>";
    header('Refresh: 3; url=tampil.php');
    exit;
} else {
    echo "<h2>Aksi tidak dikenali</h2>";
}
?>
