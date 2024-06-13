<?php
// menghubungkan koneksi database
include "koneksi.php";

// nama variabel tombol submit post
$tombol = $_POST['tombol'];

// menjalankan submit tombol tambah
if ($tombol == "Tambah") {
?>

<h2>Form Input Mahasiswa</h2>

<form method="POST" action="eksekusi.php">
    Nim: <input type="TEXT" name="nim"><br>
    Nama: <input type="TEXT" name="nama"><br>
    <input type="SUBMIT" name="tombol" value="Simpan">
</form>

<?php
} 
// menjalankan submit tombol edit
elseif ($tombol == "Edit") {
    // variabel id_mhs dari file tampil.php
    $id_mhs = $_POST['id_mhs'];

    // mencari data yang akan di edit
    $data = mysqli_query($koneksi, "SELECT * FROM tbl_mhs WHERE id_mhs='$id_mhs'");
    $d = mysqli_fetch_array($data);
?>

<h2>Form Edit Mahasiswa</h2>

<form method="POST" action="eksekusi.php">
    <input type="hidden" name="id_mhs" value="<?php echo $id_mhs; ?>">
    Nim: <input type="TEXT" name="nim" value="<?php echo $d['nim']; ?>"><br>
    Nama: <input type="TEXT" name="nama" value="<?php echo $d['nama']; ?>"><br>
    <input type="SUBMIT" name="tombol" value="Update">
</form>

<?php
} 
// menjalankan submit tombol simpan data
elseif ($tombol == "Simpan") {
    mysqli_query($koneksi, "INSERT INTO tbl_mhs (nim, nama) VALUES ('$_POST[nim]', '$_POST[nama]')");
    echo "<h2>Data berhasil disimpan</h2>";
    header('Refresh: 3; url=tampil.php');
    exit;
} 
// menjalankan submit tombol update data
elseif ($tombol == "Update") {
    mysqli_query($koneksi, "UPDATE tbl_mhs SET nim='$_POST[nim]', nama='$_POST[nama]' WHERE id_mhs='$_POST[id_mhs]'");
    echo "<h2>Data berhasil diupdate</h2>";
    header('Refresh: 3; url=tampil.php');
    exit;
} 
// menjalankan submit tombol hapus data
elseif ($tombol == "Hapus") {
    mysqli_query($koneksi, "DELETE FROM tbl_mhs WHERE id_mhs='$_POST[id_mhs]'");
    echo "<h2>Data berhasil dihapus</h2>";
    header('Refresh: 3; url=tampil.php');
    exit;
}

if (isset($_POST['tombol'])) {
    $tombol = $_POST['tombol'];

    if ($tombol == "Tambah") {
        ?>
        <h2>Form Input Mahasiswa</h2>

        <form method="POST" action="eksekusi.php">
            Nim: <input type="TEXT" name="nim"><br>
            Nama: <input type="TEXT" name="nama"><br>
            <input type="SUBMIT" name="tombol" value="Simpan">
        </form>

        <?php
    } elseif ($tombol == "Simpan") {
        mysqli_query($koneksi, "INSERT INTO tbl_mhs (nim, nama) VALUES ('$_POST[nim]', '$_POST[nama]')");
        echo "<h2>Data berhasil disimpan</h2>";
        header('Refresh: 3; url=tampil.php');
        exit;
    } elseif ($tombol == "Edit") {
        $id_mhs = $_POST['id_mhs'];
        $data = mysqli_query($koneksi, "SELECT * FROM tbl_mhs WHERE id_mhs='$id_mhs'");
        $d = mysqli_fetch_array($data);
        ?>

        <h2>Form Edit Mahasiswa</h2>

        <form method="POST" action="eksekusi.php">
            <input type="hidden" name="id_mhs" value="<?php echo $id_mhs; ?>">
            Nim: <input type="TEXT" name="nim" value="<?php echo $d['nim']; ?>"><br>
            Nama: <input type="TEXT" name="nama" value="<?php echo $d['nama']; ?>"><br>
            <input type="SUBMIT" name="tombol" value="Update">
        </form>

        <?php
    } elseif ($tombol == "Update") {
        mysqli_query($koneksi, "UPDATE tbl_mhs SET nim='$_POST[nim]', nama='$_POST[nama]' WHERE id_mhs='$_POST[id_mhs]'");
        echo "<h2>Data berhasil diupdate</h2>";
        header('Refresh: 3; url=tampil.php');
        exit;
    } elseif ($tombol == "Hapus") {
        mysqli_query($koneksi, "DELETE FROM tbl_mhs WHERE id_mhs='$_POST[id_mhs]'");
        echo "<h2>Data berhasil dihapus</h2>";
        header('Refresh: 3; url=tampil.php');
        exit;
    }
}
?>