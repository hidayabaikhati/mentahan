<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Form Login</h2>
    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo "Login gagal! Username dan password salah!";
        } else if($_GET['pesan'] == "logout"){
            echo "Anda Berhasil logout";
        } else if($_GET['pesan'] == "belum_login"){
            echo "Anda Harus Login Untuk Mengakses halaman admin";
        }
    }
    ?>
    <form action="login_exe.php" method="POST">
        <label for="Username">Username:</label>
        <input type="text" id="Username" name="Username" placeholder="Username"><br>
        <label for="Password">Password:</label>
        <input type="password" id="Password" name="Password" placeholder="Password"><br>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
