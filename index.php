<?php
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../login.php?pesan=belum_login");
    }
?>
<h2>Halaman Olah Data <?php echo $_SESSION['Username'];?></h2>

<a href=logout.php>Logout</a>