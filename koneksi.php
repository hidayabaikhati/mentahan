<?php
$hosting = "localhost";
$username= "root";
$password= "";
$database= "db_kampus";

$koneksi = mysqli_connect("$hosting","$username","$password","$database");

if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>