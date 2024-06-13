<?php
session_start();
include "koneksi.php";

$Username = mysqli_real_escape_string($koneksi, $_POST['Username']);
$Password = md5(mysqli_real_escape_string($koneksi, $_POST['Password']));

$cek = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE Username='$Username' AND Password='$Password' AND Aktif='ENABLE'");

if(mysqli_num_rows($cek) > 0)
{
    $_SESSION['Username'] = $Username;
    $_SESSION['status'] = "login";
    header("location:ADMIN/index.php");
} else {
    header("location:login.php?pesan=gagal");
}
?>
